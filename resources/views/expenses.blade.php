
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
      <div class="card" style="width: 18rem; margin-bottom:20px; test-align:right; ">
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
      <div class="box-shadow_2" style="background:rgb(173, 252, 173)">
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
           
 
             $array=[$one,$two,$three,$forth,$fifth];


            $arr_unique = array_unique($array);
            $check = count($array) !== count($arr_unique);
            $message = 'No duplicates found.';
            $arr_duplicates = [];
            if($check == 1) {
                $arr_duplicates = array_diff_assoc($array, $arr_unique);
                foreach($arr_duplicates as $key=>$val){

                  echo "<br> Checking second same value key-".$key." = ".$val."<br>";
                  
       
              $array_val[]=$val;
              
              $array_key[]=$key;
              if($key==1){
                      if($positive[0]==$tenant_1->name){
                   echo "yes posi 0";
                   echo $positive[1]=$tenant_2->name;
                     }elseif($positive[1]==$tenant_1->name){
                       echo "yes pos 1";
                   echo $positive[2]=$tenant_2->name;
                     }elseif($positive[2]==$tenant_1->name){
                       echo "yes pos 3";
                   echo $positive[3]=$tenant_2->name;
                     }elseif(!empty($positive[3])==$tenant_1->name){
                       echo "yes pos 4";
                   echo $positive[4]=$tenant_2->name;
                     }

                     if($negative[0]==$tenant_1->name){
                   echo "yes posi 0";
                   echo $negative[1]=$tenant_2->name;
                     }elseif($negative[1]==$tenant_1->name){
                       echo "yes pos 1";
                   echo $negative[2]=$tenant_2->name;
                     }elseif($negative[2]==$tenant_1->name){
                       echo "yes pos 3";
                   echo $negative[3]=$tenant_2->name;
                     }elseif($negative[3]==$tenant_1->name){
                       echo "yes pos 4";
                   echo $negative[4]=$tenant_2->name;
                     }
              }

              if($key==2){
                      if($positive[0]==$tenant_2->name){
                   echo "yes posi 0";
                   echo $positive[1]=$tenant_3->name;
                     }elseif($positive[1]==$tenant_2->name){
                       echo "yes pos 1";
                   echo $positive[2]=$tenant_3->name;
                     }elseif($positive[2]==$tenant_2->name){
                       echo "yes pos 3";
                   echo $positive[3]=$tenant_3->name;
                     }elseif($positive[3]==$tenant_2->name){
                       echo "yes pos 4";
                   echo $positive[4]=$tenant_3->name;
                     }

                     
                     if($negative[0]==$tenant_2->name){
                   echo "yes posi 0";
                   echo $negative[1]=$tenant_3->name;
                     }elseif($negative[1]==$tenant_2->name){
                       echo "yes pos 1";
                   echo $negative[2]=$tenant_3->name;
                     }elseif($negative[2]==$tenant_2->name){
                       echo "yes pos 3";
                   echo $negative[3]=$tenant_3->name;
                     }elseif($negative[3]==$tenant_2->name){
                       echo "yes pos 4";
                   echo $negative[4]=$tenant_3->name;
                     }
              }   
                 if($key==3){
                      if($positive[0]==$tenant_3->name){
                   echo "yes posi 0";
                   echo $positive[1]=$tenant_4->name;
                     }elseif($positive[1]==$tenant_3->name){
                       echo "yes pos 1 ".$tenant_3->name." change to ";
                   echo $positive[2]=$tenant_4->name;
                     }elseif($positive[2]==$tenant_3->name){
                       echo "yes pos 3";
                   echo $positive[3]=$tenant_4->name;
                     }elseif(!empty($positive[3])==$tenant_3->name){
                       echo "yes pos 4";
                   echo $positive[4]=$tenant_4->name;
                     }

                     if($negative[0]==$tenant_3->name){
                   echo "yes posi 0";
                   echo $negative[1]=$tenant_4->name;
                     }elseif($negative[1]==$tenant_3->name){
                       echo "yes pos 1";
                   echo $negative[2]=$tenant_4->name;
                     }elseif($negative[2]==$tenant_3->name){
                       echo "yes pos 3";
                   echo $negative[3]=$tenant_4->name;
                     }elseif(!empty($negative[3])==$tenant_3->name){
                       echo "yes pos 4";
                   echo $negative[4]=$tenant_4->name;
                     }
              }
                 if($key==4){
                      if($positive[0]==$tenant_4->name || $negative[0]==$tenant_4->name){
                   echo "yes posi 0";
                   echo $positive[1]=$tenant_5->name;
                     }elseif($positive[1]==$tenant_4->name){
                       echo "yes pos 1";
                   echo $positive[2]=$tenant_5->name;
                     }elseif($positive[2]==$tenant_4->name){
                       echo "yes pos 3";
                   echo $positive[3]=$tenant_5->name;
                     }elseif($positive[3]==$tenant_4->name){
                       echo "yes pos 4";
                   echo $positive[4]=$tenant_5->name;
                     }

                     if($negative[0]==$tenant_4->name){
                   echo "yes posi 0";
                   echo $negative[1]=$tenant_5->name;
                     }elseif($negative[1]==$tenant_4->name){
                       echo "yes pos 1";
                   echo $negative[2]=$tenant_5->name;
                     }elseif($negative[2]==$tenant_4->name){
                       echo "yes pos 3";
                   echo $negative[3]=$tenant_5->name;
                     }elseif($negative[3]==$tenant_4->name){
                       echo "yes pos 4";
                   echo $negative[4]=$tenant_5->name;
                     }
              }
            }//endforeach
            }//end check if=1

        
?>
              



           <?php


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   // check first positive for first negative person
   if($pos_actual[0]>$neg_actual[0]){
            $new_pos_val[0]=$neg_actual[0];   // negative first done

            $pos_first_left[0]=$pos_actual[0]-$new_pos_val[0];  //positive first left
              }elseif($pos_actual[0]<=$neg_actual[0]){
            $new_pos_val[0]=$pos_actual[0];       //positive first done

            $neg_first_left[0]=$neg_actual[0]- $new_pos_val[0]; //negative first left
               }
            echo '<div class="box-shadow_2">';
            echo "<br>". $positive[0] ."  <b> #1pos-1neg</b> ". $negative[0]. "= $".  $new_pos_val[0];
            echo '</div>';

   // check first positive for second negative person

   if(!empty($pos_first_left[0])){
     
    if( $pos_first_left[0]>0){
          if($neg_actual[1]>$pos_first_left[0]){
            $new_pos_val[1]=$pos_first_left[0];  //positive first done

           $neg_second_left[0]=$neg_actual[1]- $new_pos_val[1]; //negative second left

              }elseif($neg_actual[1]<=$pos_first_left[0]){
            $new_pos_val[1]=$neg_actual[1];             // negative second done
            $pos_first_left[1]=$pos_first_left[0]-$new_pos_val[1];//positive first left
               }
            echo '<div class="box-shadow_2">';
            echo "<br>". $positive[0] ."  <b> #1pos-2neg </b> ". $negative[1]. "= $".  $new_pos_val[1];
            echo '</div>';
            }
            }
   // check first positive for third negative person

          if(!empty($pos_first_left[1])){
              if( $pos_first_left[1]>0){
                if($neg_actual[2]>$pos_first_left[1]){
                  $new_pos_val[2]=$pos_first_left[1];  //positive first done                                          
            $neg_third_left[0]=$neg_actual[2]- $new_pos_val[2];                 //negative third done

                    }elseif($neg_actual[2]<=$pos_first_left[0]){
                  $new_pos_val[2]=$neg_actual[2];
                  $pos_first_left[2]=$pos_first_left[1]-$new_pos_val[2];    // negative third done
                    }
                  echo '<div class="box-shadow_2">';
                  echo "<br>". $positive[0] ."  <b> #1pos-3neg</b> ". $negative[2]. "= $".  $new_pos_val[2];
                  echo '</div>';

                  }
              }
  // check first positive for forth negative person

          if(!empty($pos_first_left[2])){
                if( $pos_first_left[2]>0){
                  if($neg_actual[3]>$pos_first_left[2]){
                    $new_pos_val[3]=$pos_first_left[2];  //positive first done

                    $neg_forth_left[0]=$neg_actual[3]- $new_pos_val[3]; // negative forth left
                      }elseif($neg_actual[3]<=$pos_first_left[2]){
                    $new_pos_val[3]=$neg_actual[3];
                    $pos_first_left[3]=$pos_first_left[2]-$new_pos_val[3];   // negative forth done
                       }
                    echo '<div class="box-shadow_2">';
                    echo "<br>". $positive[0] ." <b> #1pos-4neg</b> ". $negative[3]. "= $".  $new_pos_val[3];
                    echo '</div>';

          
                    }
                  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   // check first negative for second positive person

      if(!empty($neg_first_left[0])){
        if(!empty($pos_actual[1])){
    $pos_left[1]= !empty($pos_first_left[1])?$pos_first_left[1]:$pos_actual[1];

                if($neg_first_left[0]>0){

                    if($pos_left[1] > $neg_first_left[0]){
                  $new_val[1]=$neg_first_left[0]; // first negative done
                          
                  $pos_second_left[0]=$pos_left[1]-$new_val[1];  // second positive left
 
                }elseif($pos_left[1] <= $neg_first_left[0]){
                  $new_val[1]=$pos_left[1]; // positive second done
                  $neg_first_left[1]=$neg_first_left[0]-$new_val[1];   //first negative left                                 

                }
                  echo '<div class="box-shadow_2">';
                  echo "<br>".$positive[1] ." <i>#2pos-1neg </i>". $negative[0]. "= $".  $new_val[1];
                  echo '</div>';
             

                      }}}
// check first negative for third positive person

            if(!empty($neg_first_left[1])){
            if(!empty($pos_actual[2])){
    $pos_left[2]= !empty($pos_second_left[0])?$pos_second_left[0]:$pos_actual[2];
 
              if( $neg_first_left[1]>0){

                    if($pos_left[2]> $neg_first_left[1]){
                  $new_val[2]=$neg_first_left[1];    // first negative done
                  
                  $pos_third_left[0]=$pos_left[2]-$new_val[2];  // third positive left
                }elseif($pos_left[2]<= $neg_first_left[1]){
                  $new_val[2]=$pos_left[2];       // positive third done
                  $neg_first_left[2]=$neg_first_left[1]-$new_val[2];         //first negative left                                 
               
                }
                  echo '<div class="box-shadow_2">';
                  echo "<br>".$positive[2] ." <i>#3pos-1neg </i>". $negative[0]. "= $".  $new_val[2];
                  echo '</div>';
          
           
            }}}
 // check first negative for forth positive person

          if(!empty($neg_first_left[2])){
            if(!empty($pos_actual[3])){
    $pos_left[3]= !empty($pos_third_left[0])?$pos_third_left[0]:$pos_actual[3];
                if($neg_first_left[2]>0){

                 if($pos_left[3]> $neg_first_left[2]){
                $new_val[3]=$neg_first_left[2];    // first negative done
                
                $pos_forth_left[0]=$pos_left[3]-$new_val[3]; // forth positive left
               }elseif($pos_left[3]<= $neg_first_left[2]){
                $new_val[3]=$pos_left[3];   // positive forth done
                
                $neg_first_left[3]=$neg_first_left[2]-$new_val[3];//first negative left                                 

             
              }
                echo '<div class="box-shadow_2">';
                echo "<br>".$positive[3] ."  <i>#4pos-1neg </i> ". $negative[0]. "= $".  $new_val[3];
                echo '</div>';
           } }}



 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   // check second positive for second negative person
  //  if(!empty($pos_actual[1])){
  //   $pos_second_left[0] = !empty($pos_second_left[0])?$pos_second_left[0]:$pos_actual[1];
   if(!empty($pos_second_left[0])){
    //  dd($pos_second_left[0]);
      if(!empty($neg_actual[1])){
      $neg_left[1]=!empty($neg_second_left[0])?$neg_second_left[0]:$neg_actual[1];
        if( $pos_second_left[0]>0){
              if($neg_left[1]>$pos_second_left[0]){
                $new_sp_val[0]=$pos_second_left[0];                  //second positive done
                $neg_second_left[1]=$neg_left[1]-$new_sp_val[0]; // second negative left
              
                  }elseif($neg_left[1]<=$pos_second_left[0]){
                $new_sp_val[0]=$neg_left[1];                   // second negative done

                $pos_second_left[1]=$pos_second_left[0]-$new_sp_val[0];  // second positive left
         
                  }
                echo '<div class="box-shadow_2">';
                echo "<br>". $positive[1] ."  <b>#2pos-2neg </b>". $negative[1]. "= $".  $new_sp_val[0];
                echo '</div>';

                }}}

              // check second positive for third negative person
              
    // //  if( !empty($pos_second_left[1])){
    // //       if(!empty($neg_actual[2])){
    // //         $neg_left[2]= !empty($neg_third_left[0])?$neg_third_left[0]:$neg_actual[2];
    // //             if( $pos_second_left[1]>0){
    // //                   if($neg_left[2]>$pos_second_left[1]){
    // //                     $new_sp_val[1]=$pos_second_left[1];   //second positive done

    // //                     $neg_third_left[0]=$neg_left[2]-$new_sp_val[1];  // third negative left
    // //                       }elseif($neg_left[2]<=$pos_second_left[1]){
    // //                     $new_sp_val[1]=$neg_left[2];                   //third negative  done

    // //                     $pos_second_left[2]=$pos_second_left[1]-$new_sp_val[1];   //second positive left 
    // //                       }
    // //                     echo '<div class="box-shadow_2">';
    // //                     echo "<br>". $positive[1] ."  <b>#2pos-3neg </b>". $negative[2]. "= $".  $new_sp_val[1];
    // //                     echo '</div>';
    // //                     }}}
                    // check second positive for forth negative person
                    
     if( !empty($pos_second_left[2])){
                      if(!empty($neg_actual[3])){

                        $neg_left[3]= !empty($neg_forth_left[0])?$neg_forth_left[0]:$neg_actual[3];
                            if( $pos_second_left[2]>0){
                                  if($neg_left[3]>$pos_second_left[2]){
                                    $new_sp_val[2]=$pos_second_left[2];    //second positive done
                                    
                                    $neg_forth_left[0]=$neg_left[3]-$new_sp_val[2];  // forth negative left
                                      }elseif($neg_left[3]<=$pos_second_left[2]){
                                    $new_sp_val[2]=$neg_left[3];                   // forth negative done

                                    $pos_second_left[3]=$pos_second_left[2]-$new_sp_val[2];  //second positive left
                                      }
                                    echo '<div class="box-shadow_2">';
                                    echo "<br>". $positive[1] ."   <b>#2pos-4neg </b>". $negative[3]. "= $".  $new_sp_val[2];
                                    echo '</div>';
                                    }}}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  // check second negative for second positive person

             if(!empty($neg_second_left[0])){
                    if(!empty($pos_actual[1])){
                $pos_left[1]= !empty($pos_second_left[1])?$pos_second_left[1]:$pos_actual[1];

                // dd($pos_left[1]);
                if($neg_second_left[0]>0){

                    if($pos_left[1] > $neg_second_left[0]){
                  $new_val[1]=$neg_second_left[0]; // second negative done
                          
                  $pos_second_left[1]=$pos_left[1]-$new_val[1];  // second positive left
             
                }elseif($pos_left[1] <= $neg_second_left[0]){
                  $new_val[1]=$pos_left[1]; // positive second done
                  $neg_second_left[1]=$neg_second_left[0]-$new_val[1];   //first negative left                                 

                }
                  echo '<div class="box-shadow_2">';
                  echo "<br>".$positive[1] ." <i>#2pos-2neg </i>". $negative[1]. "= $".  $new_val[1];
                  echo '</div>';
             

                      }}}      
                     // check second negative for third positive person 
                      
                      if(!empty($neg_second_left[1])){
            
                    if(!empty($pos_actual[2])){
                $pos_left[2]= !empty($pos_third_left[0])?$pos_third_left[0]:$pos_actual[2];

                if($neg_second_left[1]>0){

                    if($pos_left[2] > $neg_second_left[1]){
                  $new_val[2]=$neg_second_left[1]; // second negative done
                          
                  $pos_third_left[1]=$pos_left[2]-$new_val[2];  // second positive left
              
                }elseif($pos_left[2] <= $neg_second_left[1]){
                  $new_val[2]=$pos_left[2]; // positive second done
                  $neg_second_left[2]=$neg_second_left[1]-$new_val[2];   //first negative left                                 

                }
                  echo '<div class="box-shadow_2">';
                  echo "<br>".$positive[2] ." <i>#_3pos-2neg </i>". $negative[1]. "= $".  $new_val[2];
                  echo '</div>';
             

                      }}}
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////

 
                // check third negative  for second positive person
                if(!empty($neg_actual[2])){
                  $neg_third_left[0]=!empty($neg_third_left[0])?$neg_third_left[0]:$neg_actual[2];
              
     if(!empty($pos_actual[1])){
    $pos_second_left[0]= !empty($pos_second_left[0])?$pos_second_left[0]:$pos_actual[1];
        if( $neg_third_left[0]>0){
              if($neg_third_left[0]>$pos_second_left[0]){
                $new_sp_val[2]=$pos_second_left[0];
                  }elseif($neg_third_left[0]<=$pos_second_left[0]){
                $new_sp_val[2]=$neg_third_left[0];                   // negative third done

                  }
                echo '<div class="box-shadow_2">';
                echo "<br>". $positive[1] ."  <i>second positive to third negative person </i>". $negative[2]. "= $".  $new_sp_val[2];
                echo '</div>';
                }}}

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////

 
    //             // check third negative  for second positive person
    //             if(!empty($neg_third_left[0])){
    //    dd($neg_third_left[0]);
    // $neg_third_left[0]= !empty($neg_third_left[0])?$neg_third_left[0]:$neg_actual[2];
    //     if( $pos_third_left[0]>0){
    //           if($neg_third_left[0]>$pos_third_left[0]){
    //             $new_sp_val[2]=$pos_third_left[0];
    //               }elseif($neg_third_left[0]<=$pos_third_left[0]){
    //             $new_sp_val[2]=$neg_third_left[0];                   // negative third done

    //               }
    //             echo '<div class="box-shadow_2">';
    //             echo "<br>". $positive[2] ."  <i>third positive to third negative person </i>". $negative[2]. "= $".  $new_sp_val[2];
    //             echo '</div>';
    //             $pos_third_left[0]=$pos_third_left[0]-$new_sp_val[2];
    //             $neg_forth_left[0]=$neg_forth_left[0]-$new_sp_val[2];
    //             }}




        }
        ?>
        </div>
        @endif

        </x-slot>

        </x-layout>

