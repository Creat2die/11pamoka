<?php

echo '<pre>';

for($i = 0; $i<5; $i++ ){
    echo "Dabar: $i \n";
}

echo '<br>---1---<br>';
?>

<div style="display: flex; width: 100%; flex-wrap: wrap;">
    <?php
        for ($i =0; $i<400; $i++){
       echo "<span>*</span>";
        }
    ?>
</div>


    <?php
        for ($i =0; $i<8; $i++){
            for ($m =0; $m<50; $m++){
         echo "<span>*</span>";
            }
            echo '<br>';
        }
    
        echo '<br>---2---<br>';
        $sum2=0;
        for ($i =0; $i<300; $i++){
            $sk2 =rand(0,300);
            if ($sk2 > 150){
                $sum2++;
            }
            if($sk2 > 275){
                echo "<span style='color:red'>$sk2 </span>";
            }
            echo "$sk2 ";
        }
        echo "<br> $sum2";

        echo '<br>---3---<br>';

        ?>
       <div style="display: flex; width: 100%; flex-wrap: wrap;">
        <?php
        $test ='';
        for ($i =1; $i<rand(3000,4000); $i++){
            if($i % 77 === 0 ){
               $test .= "$i,";  
            }
        }
        echo substr_replace($test ,"", -1);

        ?> 
        </div>

        <div style="line-height:6px">
        <?php

        echo '<br>---4---<br>';
        
        for($i = 0; $i < 100; $i++){
            for($m = 0; $m < 100; $m++){
            echo '<span>*</span>';
            }
            echo '<span style="line-height: 1px"><br></span>';
        }
        ?>
         </div>


         <div style="line-height:6px">
        <?php

        echo '<br>---5---<br>';
        
        for($i = 0; $i < 100; $i++){
            for($m = 0; $m < 100; $m++){
                if($m === $i ){
                    echo '<span style="color: red">*</span>';
                }else {
                    echo '<span>*</span>';
                }
            }
            echo '<span style="line-height: 1px"><br></span>';
        }
        ?>
         </div>


         <?php
         echo '<br>---6a---<br>';

         $sk6 = 100;
         $sum6 = 0;

         while ($sk6 !== 1){
            $sk6 = rand(0,1);
            if($sk6 === 0){
                echo 'S';
            }else
            {echo 'H';}
         }
         echo '<br>---6b---<br>';
         $sk61 = 100;
         $sum61 = 0;

         while ($sum61 !== 3){
            $sk61 = rand(0,1);
            if($sk61 === 0){
                echo 'S';

            }else
            {echo 'H';
            $sum61++;}
         }
         echo '<br>---6c---<br>';

         $sk62 = 100;
         $sum62 = 0;
         while ($sum62 !== 3){
            $sk62 = rand(0,1);
            if($sk62 === 0){
                echo 'S';
                $sum62=0;
            }else{
                echo 'H';
                $sum62++;
            }
         }

         echo '<br>---7---<br>';
         $K7 = 0;
         $P7 = 0;

         while( $K7 < 222 || $P7 < 222 ){
            $sumK = rand(10,20);
            $K7 +=  $sumK;
            $sumP = rand(5,25);
            $P7 +=  $sumP;
         }
         if($sumK> $sumP){
            echo 'laimejo Kazys';
         } else{
            echo 'laimejo Petras';

         }

         echo '<br>---8---<br>';
         $m =0;
         $g= 0;
         for ($i= 0; $i<11; $i++){
            while ($m< 20/2 -$i){
                echo '<span> </span>';
                $m++;
            }
            while ($g< $i+1){
                echo '<span>*</span>';
                $m++;
                $g++;
            }
            while ($m< 21 -$i){
                echo '<span> </span>';
                $m++;
            }
            echo '<br>';
            $m = 0 ;
            $g= 0;
         }
         for ($i= 0; $i<10; $i++){
            while ($m< $i+1){
                echo '<span> </span>';
                $m++;
            }
            while ($g< 20/2-$i){
                echo '<span>*</span>';
                $m++;
                $g++;
            }
            $m = 0 ;
            while ($m< $i+1){
                echo '<span> </span>';
                $m++;
            }
            echo '<br>';
            $m = 0 ;
            $g= 0;
         }

         echo '<br>---10a---<br>';
         $ilgis =850;
         $smugis=0;
         while($ilgis>0){
            $ilgis-=rand(5,20);
            $smugis++;
         }
         echo "skugiai: $smugis";

         echo '<br>---10b---<br>';

         $ilgis =850;
         $vinys=0;
         $smugis=0;
         while ($vinys <5){
           
            while($ilgis>0){
                $s=rand(0,1);
                if($s === 1){
                    $ilgis-=rand(20,30);
                }  
                $smugis++;
             }
             $vinys++;
         }

         echo "sukalem $vinys , reikejo smugiu: $smugis";