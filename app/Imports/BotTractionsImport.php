<?php 
namespace App\Imports;

use App\Models\BotUrl;
use Maatwebsite\Excel\Concerns\ToModel;

class BotTractionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BotUrl([
            'url'     => $row[0],
            
          
        ]);
    }
}