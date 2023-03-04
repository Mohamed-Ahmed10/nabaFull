

@component('mail::message')
# Introduction

NABA APPLICATION

<div style="text-align: center;font-family: Arial, Helvetica, sans-serif;">
    <!-- <h1 style="font-size: 50px;">ETMAEN GROUP</h1> -->
    <div style=" background-color: #F2F2F2;width: fit-content;margin: 25px auto 0;padding: 40px 18px;">
        <?php 
            if($data->section_no == 1){
                $item = "Products";
            }elseif($data->section_no == 1){
                $item = "Services";
            }
        ?>
        <h2 style=" color: #222; font-weight: 600; font-size: 24px;">Mail For {{$item}}</h2>
        <p style="color: #222; font-weight: 600; font-size:14px">Personal Name: {{$data->name}}</p>
        <p style="color: #222; font-weight: 600; font-size:14px">Company Name: {{$data->company_name}}</p>
        <p style="color: #222; font-weight: 600; font-size:14px">Email: {{$data->email}}</p>
        <p style="color: #222; font-weight: 600; font-size:14px">Phone: {{$data->phone}}</p>
        <p style="color: #222; font-weight: 600; font-size:14px">Country: {{$data->country}}</p>
        <p style="color: #222; font-weight: 600; font-size:14px">Notes: {{$data->notes}}</p>
        <!-- <p style="color: #222; font-weight: 600; font-size:14px">The link is valid for 24 hours and can be used once only.</p> -->
        <!-- <p style="color: #C7C7C7; margin-top: 50px; font-size:14px">Please note: This e-mail was sent from a notification-only address that cannot accept incoming emails. Please do not reply to this message.</p> -->
    </div>
</div>

,Thanks<br>

NABA
@endcomponent
