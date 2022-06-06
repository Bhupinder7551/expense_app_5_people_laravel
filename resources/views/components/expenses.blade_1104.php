
<x-layout>
  <x-slot name="title">Expenses</x-slot>
  <x-slot  name="heading">
    Expenses

   {{-- {{__('home.Heading_alltenant')}} --}}
  </x-slot>
  <x-slot name="left_content">
    <form method="POST" action="" enctype="multipart/form-data"  >
   @csrf
   @method('PUT')

  {{-- //bhupinder data --}}
  <x-card name="{{$tenant_1->name}}" contact="{{$tenant_1->contact}}" expenses="{{$tenant_1->expenses}}" value="expense1_value" />

  {{-- //harjeet data --}}
    <x-card name="{{$tenant_2->name}}" contact="{{$tenant_2->contact}}" expenses="{{$tenant_2->expenses}}" value="expense2_value" />


  {{-- //karan data --}}
  <x-card name="{{$tenant_3->name}}" contact="{{$tenant_3->contact}}" expenses="{{$tenant_3->expenses}}" value="expense3_value" />
 {{-- //karan data --}}
 <x-card name="{{$tenant_4->name}}" contact="{{$tenant_4->contact}}" expenses="{{$tenant_4->expenses}}" value="expense4_value" />
 {{-- //karan data --}}
 <x-card name="{{$tenant_5->name}}" contact="{{$tenant_5->contact}}" expenses="{{$tenant_5->expenses}}" value="expense5_value" />

    <button type="submit" class="btn btn-info" >Submit</button>
  </form>
  </x-slot>
<x-slot name="right_content">
   {{-- //get total --}}
    <?php  $Total= array($tenant_1->expenses, $tenant_2->expenses, $tenant_3->expenses, $tenant_4->expenses,$tenant_5->expenses);
      $total= array_sum($Total);
     ?>
    <div style="box-shadow: 3px 3px black, -0.5em 0 0.9em grey; padding:12px; float:right"> <b>Total: {{$total}}</b></div>
     <br/>

   {{-- //end get total --}}


   {{-- //get each function in controller --}}
      @if (session()->has('each'))
      <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; padding:12px;margin-top:50px;text-align: center;"> Each : {{session('each')}}  </div>


   {{-- //end get each  --}}
      <br/>


   {{-- //get each person value (-) minus  --}}
      <div class="card" style="width: 18rem; margin-bottom:20px; test-align:right">
        <ul class="list-group list-group-flush">
            <?php
                $one=(session('each')-$tenant_1->expenses);
                echo' <li class="list-group-item">';
                echo "$tenant_1->name = ".$one;
                echo'</li>';

                $two=(session('each')-$tenant_2->expenses);
                echo' <li class="list-group-item">';
                echo "$tenant_2->name = ".$two;
                echo'</li>';

                $three=(session('each')-$tenant_3->expenses);
                echo' <li class="list-group-item">';
                echo "$tenant_3->name = ".$three."<br>";
                echo'</li>';

                $forth=(session('each')-$tenant_4->expenses);
                echo' <li class="list-group-item">';
                echo "$tenant_4->name = ".$forth."<br>";
                echo'</li>';

                $fifth=(session('each')-$tenant_5->expenses);
                echo' <li class="list-group-item">';
                echo "$tenant_5->name = ".$fifth."<br>";
                echo'</li>';
             ?>
          </ul>
      </div>

   {{-- //end get each person value (-) minus  --}}

   {{-- //check value of each person is same  --}}
      <div class="box-shadow_" style="background:rgb(173, 252, 173)">
          <?php
              if($one==$two && $one==$three && $one==$forth && $one==$fifth){
              echo "Perfect everyone spend equally";
              }

              else{

            ?>
      </div>

   {{-- //end value of each person is same  --}}

   {{-- // to seprate +ve or -ve number --}}
      <?php
        $x=[$one,$two,$three,$forth,$fifth];
        foreach($x as  $x) {
          if($x<0){
              $negative[] =  $x;
          }elseif($x>0){

            $positive[] = $x;
          }else{
            $nothing= "nothing";
          }
        }
        //end to seprate +ve or -ve number

        // check negative first value
              if(!empty($negative[0])){
              if ($negative[0] == $one){
                  $negative[0] =$tenant_1->name;
                  $neg_val[0] =-$one;
              }elseif ($negative[0] == $two){
                $negative[0] =$tenant_2->name;
                $neg_val[0] =-$two;
              } elseif ($negative[0] == $three) {
                $negative[0] =$tenant_3->name;
                $neg_val[0] =-$three;
              } elseif ($negative[0] == $forth) {
                $negative[0] =$tenant_4->name;
                $neg_val[0] =-$forth;
              }elseif ($negative[0] == $fifth) {
                $negative[0] =$tenant_5->name;
                $neg_val[0] =-$fifth;
              }

          $neg_actual[0]=$neg_val[0];}

        // check negative second value
              if(!empty($negative[1])){
              if ($negative[1] == $one){
                $negative[1] =$tenant_1->name;
                $neg_val[1] =-$one;
              } elseif ($negative[1] == $two) {
              $negative[1] =$tenant_2->name;
              $neg_val[1] =-$two;
              } elseif ($negative[1] == $three) {
              $negative[1] =$tenant_3->name;
              $neg_val[1] =-$three;
              }elseif ($negative[1] == $forth) {
                $negative[1] =$tenant_4->name;
                $neg_val[1] =-$forth;
              }elseif ($negative[1] == $fifth) {
                $negative[1] =$tenant_5->name;
                $neg_val[1] =-$fifth;
              }

          $neg_actual[1]=$neg_val[1];}


        // check negative third value
        if(!empty($negative[2])){
              if ($negative[2] == $one){
                $negative[2] =$tenant_1->name;
                $neg_val[2] =-$one;
              } elseif ($negative[2] == $two) {
              $negative[2] =$tenant_2->name;
              $neg_val[2] =-$two;
              } elseif ($negative[2] == $three) {
              $negative[2] =$tenant_3->name;
              $neg_val[2] =-$three;
              }elseif ($negative[2] == $forth) {
                $negative[2] =$tenant_4->name;
                $neg_val[2] =-$forth;
              }elseif ($negative[2] == $fifth) {
                $negative[2] =$tenant_5->name;
                $neg_val[2] =-$fifth;
              }
          $neg_actual[2]=$neg_val[2];}

      // check negative forth value
              if(!empty($negative[3])){
              if ($negative[3] == $one){
                $negative[3] =$tenant_1->name;
                $neg_val[3] =-$one;
              } elseif ($negative[3] == $two) {
              $negative[3] =$tenant_2->name;
              $neg_val[3] =-$two;
              } elseif ($negative[3] == $three) {
              $negative[3] =$tenant_3->name;
              $neg_val[3] =-$three;
              }elseif ($negative[3] == $forth) {
                $negative[3] =$tenant_4->name;
                $neg_val[3] =-$forth;
              }elseif ($negative[3] == $fifth) {
                $negative[3] =$tenant_5->name;
                $neg_val[3] =-$fifth;
              }

          $neg_actual[3]=$neg_val[3];}


        // check positve first value
              if(!empty($positive[0])){
              if ($positive[0] == $one){
                  $positive[0] =$tenant_1->name;
                  $pos_val[0] =$one;
              } elseif ($positive[0] == $two) {
                $positive[0] =$tenant_2->name;
                $pos_val[0] =$two;
              } elseif ($positive[0] == $three) {
                $positive[0] =$tenant_3->name;
                $pos_val[0] =$three;
              }elseif ($positive[0] == $forth) {
                $positive[0] =$tenant_4->name;
                $pos_val[0] =$forth;
              }elseif ($positive[0] == $fifth) {
                $positive[0] =$tenant_5->name;
                $pos_val[0] =$fifth;
              }

              $pos_actual[0]=$pos_val[0];
            }

        // check positve second value
              if(!empty($positive[1])){
              if ($positive[1] == $one){
                $positive[1] =$tenant_1->name;
                $pos_val[1] =$one;
              } elseif ($positive[1] == $two) {
              $positive[1] =$tenant_2->name;
              $pos_val[1] =$two;
              } elseif ($positive[1] == $three) {
              $positive[1] =$tenant_3->name;
              $pos_val[1] =$three;
              }elseif ($positive[1] == $forth) {
                $positive[1] =$tenant_4->name;
                $pos_val[1] =$forth;
              }elseif ($positive[1] == $fifth) {
                $positive[1] =$tenant_5->name;
                $pos_val[1] =$fifth;
              }

              $pos_actual[1]=$pos_val[1];
              }

        // check positve third value
        if(!empty($positive[2])){
              if ($positive[2] == $one){
                $positive[2] =$tenant_1->name;
                $pos_val[2] =$one;
              } elseif ($positive[2] == $two) {
              $positive[2] =$tenant_2->name;
              $pos_val[2] =$two;
              } elseif ($positive[2] == $three) {
              $positive[2] =$tenant_3->name;
              $pos_val[2] =$three;
              }elseif ($positive[2] == $forth) {
                $positive[2] =$tenant_4->name;
                $pos_val[2] =$forth;
              }elseif ($positive[2] == $fifth) {
                $positive[2] =$tenant_5->name;
                $pos_val[2] =$fifth;
              }

              $pos_actual[2]=$pos_val[2];
             }
             // check positve forth value
             if(!empty($positive[3])){
              if ($positive[3] == $one){
                $positive[3] =$tenant_1->name;
                $pos_val[3] =$one;
              } elseif ($positive[3] == $two) {
              $positive[3] =$tenant_2->name;
              $pos_val[3] =$two;
              } elseif ($positive[3] == $three) {
              $positive[3] =$tenant_3->name;
              $pos_val[3] =$three;
              }elseif ($positive[3] == $forth) {
                $positive[3] =$tenant_4->name;
                $pos_val[3] =$forth;
              }elseif ($positive[3] == $fifth) {
                $positive[3] =$tenant_5->name;
                $pos_val[3] =$fifth;
              }

              $pos_actual[3]=$pos_val[3];
             }


              ?>
      <?php

       $array=[$one,$two,$three,$forth];


          $arr_unique = array_unique($array);
          $check = count($array) !== count($arr_unique);
          $message = 'No duplicates found.';
          $arr_duplicates = [];
          if($check == 1) {
              $arr_duplicates = array_diff_assoc($array, $arr_unique);
              foreach($arr_duplicates as $key=>$val){

               echo "<br> Checking second same value key-".$key."<br>";

          if($key==1){
            $positive[1]=$tenant_2->name;
            $negative[1]=$tenant_2->name;
          }elseif($key==2){
            $positive[1]=$tenant_3->name;
            $negative[1]=$tenant_3->name;
          }elseif($key==3){
            $positive[2]=$tenant_4->name;
            $negative[2]=$tenant_4->name;
          }elseif($key==4){
            $positive[3]=$tenant_5->name;
            $negative[3]=$tenant_5->name;
          }
        }
      }



        ?>
           <?php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   // check first positive for first negative person
   if($pos_actual[0]>$neg_actual[0]){
            $new_pos_val[0]=$neg_actual[0];   // negative first done
              }elseif($pos_actual[0]<=$neg_actual[0]){
            $new_pos_val[0]=$pos_actual[0];
               }
            echo '<div class="box-shadow_">';
            echo "<br>". $positive[0] ."  <b>first positive person to first negative person</b> ". $negative[0]. "= $".  $new_pos_val[0];
            echo '</div>';

            $pos_left[0]=$pos_actual[0]-$new_pos_val[0];
            $neg_left[0]=$neg_actual[0]- $new_pos_val[0];
   // check first positive for second negative person

   if(!empty($pos_left[0])){
         if( $pos_left[0]>0){
          if($neg_actual[1]>$pos_left[0]){
            $new_pos_val[1]=$pos_left[0];
              }elseif($neg_actual[1]<=$pos_left[0]){
            $new_pos_val[1]=$neg_actual[1];             // negative second done
               }
            echo '<div class="box-shadow_">';
            echo "<br>". $positive[0] ."  positive to second negative person ". $negative[1]. "= $".  $new_pos_val[1];
            echo '</div>';

            $pos_left[1]=$pos_left[0]-$new_pos_val[1];
            $neg_second_left[0]=$neg_actual[1]- $new_pos_val[1];
            }}
   // check first positive for third negative person

         if(!empty($pos_left[1])){
              if( $pos_left[1]>0){
                if($neg_actual[2]>$pos_left[1]){
                  $new_pos_val[2]=$pos_left[1];
                    }elseif($neg_actual[2]<=$pos_left[1]){
                  $new_pos_val[2]=$neg_actual[2];
                  $pos_left[2]=$pos_left[1]-$neg_actual[2];    // negative third done
                    }
                  echo '<div class="box-shadow_">';
                  echo "<br>". $positive[0] ."  positive to third negative person ". $negative[2]. "= $".  $new_pos_val[2];
                  echo '</div>';

            $pos_left[2]=$pos_left[1]-$new_pos_val[2];
            $neg_third_left[0]=$neg_actual[2]- $new_pos_val[2];
            
                  }
              }
  // check first positive for forth negative person

          if(!empty($pos_left[2])){
                if( $pos_left[2]>0){
                  if($neg_actual[3]>$pos_left[2]){
                    $new_pos_val[3]=$pos_left[2];
                      }elseif($neg_actual[3]<=$pos_left[2]){
                    $new_pos_val[3]=$neg_actual[3];
                    $pos_left[3]=$pos_left[2]-$neg_actual[3];    // negative forth done
                      }
                    echo '<div class="box-shadow_">';
                    echo "<br>". $positive[0] ."  positive to third negative person ". $negative[3]. "= $".  $new_pos_val[3];
                    echo '</div>';

            $pos_left[3]=$pos_left[2]-$new_pos_val[3];
            $neg_forth_left[0]=$neg_actual[3]- $new_pos_val[3 ];
                    }}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   // check first negative for second positive person

      if(!empty($neg_left[0])){

    $pos_second_left[0]= !empty($pos_second_left[0])?$pos_second_left[0]:$pos_actual[1];
                if($neg_left[0]>0){

                    if($pos_second_left[0] > $neg_left[0]){
                  $new_val[1]=$neg_left[0];
                }elseif($pos_second_left[0] <= $neg_left[0]){
                  $new_val[1]=$pos_second_left[0];
                                                       // positive second done

                }
                  echo '<div class="box-shadow_">';
                  echo "<br>".$positive[1] ." <b>second positive person to first negative person </b>". $negative[0]. "= $".  $new_val[1];
                  echo '</div>';
                  $neg_left[1]=$neg_left[0]-$new_val[1];

                  $pos_second_left[0]=$pos_left[3]-$new_val[1];
                      }}
// check first negative for third positive person

            if(!empty($neg_left[1])){

    $pos_third_left[0]= !empty($pos_third_left[0])?$pos_third_left[0]:$pos_actual[2];
              if( $neg_left[1]>0){

                    if($pos_third_left[0]> $neg_left[1]){
                  $new_val[2]=$neg_left[1];
                }elseif($pos_third_left[0]<= $neg_left[1]){
                  $new_val[2]=$pos_third_left[0];
                                                    // positive third done
                }
                  echo '<div class="box-shadow_">';
                  echo "<br>".$positive[2] ."<b> third positive person to first negative person </b>". $negative[0]. "= $".  $new_val[2];
                  echo '</div>';
                  $neg_left[2]=$neg_left[1]-$new_val[2];
                  $pos_third_left[0]=$pos_third_left[0]-$new_val[2];
            }}
 // check first negative for forth positive person

          if(!empty($neg_left[2])){

    $pos_forth_left[0]= !empty($pos_forth_left[0])?$pos_forth_left[0]:$pos_actual[3];
                if($neg_left[2]>0){

                 if($pos_forth_left[0]> $neg_left[2]){
                $new_val[3]=$neg_left[2];
               }elseif($pos_forth_left[0]<= $neg_left[2]){
                $new_val[3]=$pos_forth_left[0];
               // positive forth done
              }
                echo '<div class="box-shadow_">';
                echo "<br>".$positive[3] ." <b>forth positive person to first negative person</b> ". $negative[0]. "= $".  $new_val[3];
                echo '</div>';
                $neg_left[3]=$neg_left[2]-$new_val[3];
                $pos_forth_left[1]=$pos_forth_left[0]-$new_val[3];
        }}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 // check second negative for second positive person

 if(!empty($neg_second_left[0])){
  $pos_second_left[1]= !empty($pos_second_left[1])?$pos_second_left[1]:$pos_actual[1];

                if($neg_second_left[0]>0){
                    if($pos_second_left[1] > $neg_second_left[0]){
                  $new_val[0]=$neg_second_left[0];
                }elseif($pos_second_left[1] <= $neg_second_left[0]){
                  $new_val[0]=$pos_second_left[1];
                                                   // positive second done

                }
                  echo '<div class="box-shadow_">';
                  echo "<br>".$positive[1] ." <b>second positive person to second negative person </b>". $negative[1]. "= $".  $new_val[0];
                  echo '</div>';

                  $pos_second_left[2]=$pos_second_left[1]-$new_val[0];
                  $neg_second_left[1]=$neg_second_left[0]-$new_val[0];
 
                      }
                    }
     // check second negative for third positive person

   if(!empty($neg_second_left[1])){
    $pos_second_left[1]= !empty($pos_third_left[1])?$pos_third_left[1]:$pos_actual[2];
                  if($neg_second_left[1]>0){

                      if($pos_third_left[1] > $neg_second_left[1]){
                    $new_val[1]=$neg_second_left[1];
                  }elseif($pos_third_left[1] <= $neg_second_left[1]){
                    $new_val[1]=$pos_third_left[1];
                                                     // positive third done

                  }
                    echo '<div class="box-shadow_">';
                    echo "<br>".$positive[2] ." <b>third positive person to second negative person </b>". $negative[1]. "= $".  $new_val[1];
                    echo '</div>';

                    $pos_third_left[2]=$pos_third_left[1]-$new_val[1];
                    $neg_second_left[2]=$neg_second_left[1]-$new_val[1];
                        }}
 // check second negative for forth positive person

 if(!empty($neg_second_left[2])){
  $pos_forth_left[1]= !empty($pos_forth_left[1])?$pos_forth_left[1]:$pos_actual[3];
                if($neg_second_left[2]>0){

                    if($pos_forth_left[1] > $neg_second_left[2]){
                  $new_val[2]=$neg_second_left[2];
                }elseif($pos_forth_left[1] <= $neg_second_left[2]){
                  $new_val[2]=$pos_forth_left[1];
                                                   // positive forth done

                }
                  echo '<div class="box-shadow_">';
                  echo "<br>".$positive[3] ." <b>forth positive person to second negative person </b>". $negative[1]. "= $".  $new_val[2];
                  echo '</div>';

                  $pos_forth_left[2]=$pos_forth_left[1]-$new_val[2];
                  $neg_second_left[3]=$neg_second_left[2]-$new_val[2];
                      }}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //important s-second,p-positive,n-negative


    // check second positive for third negative person
   if(!empty($pos_second_left[2])){
    $neg_third_left[0]= !empty($neg_third_left[0])?$neg_third_left[0]:$neg_actual[2];
        if( $pos_second_left[2]>0){
              if($neg_third_left[0]>$pos_second_left[2]){
                $new_sp_val[1]=$pos_second_left[2];
                  }elseif($neg_third_left[0]<=$pos_second_left[2]){
                $new_sp_val[1]=$neg_third_left[0];                   // negative third done

                  }
                echo '<div class="box-shadow_">';
                echo "<br>". $positive[1] ."  <i>second positive to third negative person </i>". $negative[2]. "= $".  $new_sp_val[1];
                echo '</div>';
                $pos_second_left[3]=$pos_second_left[2]-$new_sp_val[1];
                $neg_third_left[1]=$neg_third_left[0]-$new_sp_val[1];
                }}
  //////////////////////////////////////////////////////////////////////////////////////////////
     // check third negative  for second positive person
      if(!empty($neg_third_left[0])){
    $pos_second_left[3]= !empty($pos_second_left[3])?$pos_second_left[3]:$pos_actual[1];
    
        if( $pos_second_left[3]>0){
              if($neg_third_left[0]>$pos_second_left[3]){
                $new_sp_val[2]=$pos_second_left[3];
                  }elseif($neg_third_left[0]<=$pos_second_left[3]){
                $new_sp_val[2]=$neg_third_left[0];
                                                 // negative forth done
                  }
                echo '<div class="box-shadow_">';
                echo "<br>". $positive[1] ."  <i>second positive to third negative person </i>". $negative[2]. "= $".  $new_sp_val[2];
                echo '</div>';
                $pos_second_left[4]=$pos_second_left[3]-$new_sp_val[2];
                $neg_third_left[2]=$neg_third_left[0]-$new_sp_val[2];
                }}

        }
        ?>
        </div>
        @endif

        </x-slot>

        </x-layout>

