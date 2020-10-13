<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class beneficiaries extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     $scheme_results = DB::select('SELECT `id`, `scheme_name` as name FROM `schemes` WHERE `status`= :status', ['status' => 1]);
     $state_results = DB::select('SELECT `id`, `state_name` as name FROM `states` ');

     $b_results = $this->list_beneficiaries('','all');
     
     $total_amount_sum = array_sum(array_map(function($item) { 
            return $item->amount; 
        }, $b_results));     

     return view('beneficiaries', ['schemes' => $scheme_results,'states' => $state_results,'beneficiaries' => $b_results,'total_amount_sum'=> number_format($total_amount_sum)]);     
    }

    function list_beneficiaries($post='',$type)
    {
    	if($type=='all')
    	{
    		$results = DB::select('SELECT b.*,st.state_name,s.scheme_name,s.amount FROM `beneficiaries` as b JOIN states as st ON b.state_id=st.id JOIN schemes as s ON b.scheme_id=s.id WHERE 1 order by b.id desc'); 
    	}
    	else
    	{    	 
    		$state_id = $post['states'];
    		$scheme_id = $post['scheme'];

    		if(!empty($post['states']) && !empty($post['scheme']))
    		{
    			$results = DB::select('SELECT b.*,st.state_name,s.scheme_name,s.amount FROM `beneficiaries` as b JOIN states as st ON b.state_id=st.id JOIN schemes as s ON b.scheme_id=s.id WHERE  st.id = :state_id and s.id = :scheme_id order by b.id desc', ['state_id' => $state_id,'scheme_id' => $scheme_id]); 
    		}
    		else if(!empty($post['states']) && empty($post['scheme']))
    		{
    			$results = DB::select('SELECT b.*,st.state_name,s.scheme_name,s.amount FROM `beneficiaries` as b JOIN states as st ON b.state_id=st.id JOIN schemes as s ON b.scheme_id=s.id WHERE st.id = :state_id   order by b.id desc', ['state_id' => $state_id]);
    		}
    		else if(empty($post['states']) && !empty($post['scheme']))
    		{
    			$results = DB::select('SELECT b.*,st.state_name,s.scheme_name,s.amount FROM `beneficiaries` as b JOIN states as st ON b.state_id=st.id JOIN schemes as s ON b.scheme_id=s.id WHERE  s.id = :scheme_id  order by b.id desc', ['scheme_id' => $scheme_id]); 
    		}
    		else
    		{
    			$results = DB::select('SELECT b.*,st.state_name,s.scheme_name,s.amount FROM `beneficiaries` as b JOIN states as st ON b.state_id=st.id JOIN schemes as s ON b.scheme_id=s.id WHERE 1 order by b.id desc'); 
    		}
    	}
    	return $results;
    }

    function fetch_beneficiaries()
    {
    	$results = $this->list_beneficiaries($_POST,'filter');

    	if(count($results))
    	{
    	$i=1;
    	$str ='<thead>
                  <tr>
                   <th>Sr.</th>
                   <th>Name</th>
                   <th>Gender</th>
                   <th>State</th>
                   <th>Scheme</th>
                   <th>Amount</th>
                </tr>
                </thead>
                <tbody>';
        $total_amount_sum = 0;

    	foreach ($results as $key => $b) {
    		$str .= '<tr>
			            <td>'.$i.'</td>
			            <td>'.$b->name.'</td>
			            <td>'.$b->gender.'</td>
			            <td>'.$b->state_name.'</td>
			            <td>'.$b->scheme_name.'</td>
			            <td>'.number_format($b->amount).'</td>
			        </tr>';
                $total_amount_sum += $b->amount;
			$i++;
			}
            $str .= '</tbody><tfooter>
                  <tr>
                   <th colspan="5" style="text-align: right;">Total</th>
                   <th>'.$total_amount_sum.'</th>
                </tr>
                </tfooter>';
    		
    	}
    	else
    	{
    		$str = '<tr><td colspan="6">No record found</td></tr>';
    	}

    	echo $str;
    }
    	

    	
}
