<?php

namespace App\Console\Commands;

use DateTime;
use Illuminate\Console\Command;
use App\DebtData;

class UpdateData extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates data with latest data from treasurydirect.gov';

    /**
     * Create a new command instance.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * Data comes from:
     * https://treasurydirect.gov/NP/debt/search?startMonth=01&startDay=04&startYear=1993&endMonth=12&endDay=28&endYear=2017
     * https://treasurydirect.gov/govt/reports/pd/histdebt/histdebt.htm
     *
     * @return mixed
     */
    public function handle() {
        $xml = simplexml_load_string(file_get_contents('https://treasurydirect.gov/NP/debt/rss'));

        foreach($xml->channel->item AS $item){
            $date = trim(str_replace('Debt to the Penny for ', '', $item->title), ' ');

            $amount = explode('</em>', $item->children('content', TRUE));
            $amount = trim(end($amount), ' ');

            $data[] = ['date' => $date, 'amount' => $amount];
        }

        # Fill this array manual inserts, as needed, like when seeding initially without using the Seeder
        #$data = [
        #     ['date' => '07/01/1849', 'amount' => '63,061,858.69'],
        #];

        $this->info("Starting UpdateData.php");

        usort($data, function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        foreach($data as $datum){
            $datum['date'] = (new DateTime($datum['date']))->format('Y-m-d');
            $datum['amount'] = str_replace(',', '', $datum['amount']);

            $existing = DebtData::firstOrNew(['date' => $datum['date']]);

            if(!$existing) {
                $d = new DebtData;
                $d->date = $datum['date'];
                $d->total_public_debt_outstanding = $datum['amount'];
                $d->save();
            } else {
                $existing->total_public_debt_outstanding = $datum['amount'];
                $existing->save();
            }

        }

        $this->info("Completed UpdateData.php");
    }
}


