<?php

namespace App\Http\Controllers;

use App\Models\CustomerProvince;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomerDataController extends Controller
{

    public function index()
    {
        $customer_province = CustomerProvince::orderBy('customer_count', 'DESC')->get();

        return view('dashboard', compact('customer_province'));
    }

    public function insert_province_names_from_orders_csv()
    {
        $csvFile = file("orders.csv");
        $order_data = [];
        foreach ($csvFile as $line) {
            $order_data[] = str_getcsv($line);
        }
//        echo "<pre>";
//        print_r($order_data);
//        echo "</pre>";

        $customer_province_name_array = [];
        foreach ($order_data as $key => $order) {
            if($key == 0) {
                //skip to next iteration, first row is column name
                continue;
            }
            // Shipping Province Name column is 73
            if ( !empty($order[73]) ) {
                $customer_province_name_array[] = trim($order[73]);
            }
        }

        // Getting unique names only
        $customer_province_name_unique = array_unique($customer_province_name_array);

        foreach ($customer_province_name_unique as $customer_province_name)
        {
            $customer_province = new CustomerProvince();
            $customer_province->province_name = $customer_province_name;
            $customer_province->save();
        }

        return 'Province names added successfully';
    }


    public function add_customers_based_on_province_csv()
    {
        $csvFile = file("orders.csv");
        $order_data = [];
        foreach ($csvFile as $line) {
            $order_data[] = str_getcsv($line);
        }

        // Make the customer_count db column 0 for all provinces to set new count
        $customer_province = CustomerProvince::all();
        foreach ($customer_province as $province){
            $province->customer_count = 0;
            $province->save();
        }

        foreach ($order_data as $key => $order) {
            if($key == 0) {
                //skip to next iteration, first row is column name
                continue;
            }
            // Shipping Province Name column is 73
            if ( !empty($order[73]) ) {
                $customer_province = CustomerProvince::where('province_name', trim($order[73]))->first();
                if ($customer_province)
                {
                    $customer_province->customer_count = 1;
                    $customer_province->save();
                }
            }
        }



        return 'Process completed successfully';
    }
}
