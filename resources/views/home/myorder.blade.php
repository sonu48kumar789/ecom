@extends('home.base')


@section('content')
    
<div class="py-3 bg-dark text-white">
    <div class="container">
         <h6>Home/</h6>
         <h2>My Order</h2>
     </div>
 </div>
 
 <div class="container">
 
     <div class="row mt-4">
         <div class="col">
        <?php 
        $final = 0;
        foreach ($order as $o) {
       ?>
       <div class="card mb-3 bg-light ">
       <div class="card-header">Date: <?= date("D d-M-Y h:i:s A",strtotime($o->created_at));?></div>
           <div class="card-body">
               <?php foreach ($o->orderitem as $oi) { ?>
         <div class="col-lg-12">
             <div class="card mb-3">
                 <div class="row">
                     <div class="col-lg-2">
                        <?php 
                        if($oi->pro->isVeg==true):
                            $color = "bg-success";
                            $text = "Veg";
                    else:
                            $color = "bg-danger";
                            $text = "Non-Veg";
                    endif;
                    ?>
                    <span class="veg <?= $color;?>"><?= $text;?></span>
                    <img src="pro.png" class="w-100" alt="">
                     </div>
                     <div class="col">
                         <div class="card-body">
                         <h5>{{ $oi->pro->title }}</h5>
                        <a href="{{ route('removecart',['item_id'=>$oi->pro->id])}}" class="btn btn-danger">-</a>
                         <span>{{$oi->qty}}</span>
                         <a href="{{ route('addtocart',['item_id'=>$oi->pro->id])}}" class="btn btn-success">+</a>
                         </div>
                     </div>
                     <div class="col-2">
                         <br>
                         <br>
                     <a href="{{ route('removeitem',['item_id'=>$oi->pro->id])}}" class="text-muted small">Remove</a>
                     </div>
                     <div class="col-2">
                         <br>
                         <h3>???<?php echo $total = $oi->pro->price * $oi->qty; $final += $total;?>/-</h3>
                         <h6 class="small text-muted">{{$oi->pro->price}}/- Per Unit</h6>
                     </div>
                 </div>
             </div>
         </div>
        <?php } ?>
        </div>
    </div>
        <?php } ?>
     </div>
    </div>
 </div>
 
 
@endsection