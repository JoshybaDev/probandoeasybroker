<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JoshybaCorpDevs\EasyBroker\EasyBroker;

class EasybrokerController extends Controller
{
    public function point()
    {
        $data="";
        // $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        // $response=$easy->client()->properties()->find("xxxx");
        // dd($response);
        // //

        // $response=$easy->client()->properties()->search([""=>""]);

        // $response=$easy->client()->locations()->search([""=>""]);

        // $response=$easy->client()->contact_requests()->search([""=>""]);

        // $response=$easy->client()->mls_properties()->search([""=>""]);

        return view("points",compact('data'));
    }
    public function contactreqgetall()
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactosResponsePagination = $easy->client()->contact_requests()->search([]);
        session()->put("contactosResponsePagination",$contactosResponsePagination);
        $content=$contactosResponsePagination->content();
        //$pagination=$contactosResponsePagination->pagination();
        $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());
        return view("contactoscontent",compact('content','paginator'));
    }
    public function contactreqgetallnext($page)
    {
        //dd($page);
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactosResponsePagination = session()->get("contactosResponsePagination");
        $contactosResponsePagination->select_page($page);
        //return $content=$contactosResponsePagination->response();
        $content=$contactosResponsePagination->content();
        //$pagination=$contactosResponsePagination->pagination();
        $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());
        return view("contactoscontent",compact('content','paginator'));
    }
    function paginator($page,$total)
    {
        $previus_page=0;
        $previus_status="disabled";
        $page_first=$page;
        $page_first_status="";
        $page_second=2;
        $page_second_status="disabled";
        $page_third=3;
        $page_third_status="disabled";
        $next_page=0;
        $next_page_status="disabled";
        //
        if($page>1)
        {
            $previus_status="";
            $previus_page=$page-1;
        }

        if($page<$total)//1<1
        {
            $page_second=$page+1;
            $page_second_status="";
            $next_page=$page_second;
            $next_page_status="";
        }
        if(($page+2)<=$total)//3<=1
        {
            $page_third=$page+2;
            $page_third_status="";
        }
        $paginator["previus_page"]=$previus_page;  
        $paginator["previus_status"]=$previus_status;          
        $paginator["page_first"]=$page_first;
        $paginator["page_first_status"]=$page_first_status;        
        $paginator["page_second"]=$page_second;
        $paginator["page_second_status"]=$page_second_status;
        $paginator["page_third"]=$page_third;
        $paginator["page_third_status"]=$page_third_status; 
        $paginator["next_page"]=$next_page;   
        $paginator["next_status"]=$next_page_status;
        $paginator["page_total"]=$total;
        return $paginator;            
    }
}
