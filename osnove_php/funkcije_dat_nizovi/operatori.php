<!DOCTYPE html>
<html>
    <head>
        <title>Operatori u PHP</title>
    </head>
    <body>
        <?php

        echo "<h1>Operatori u PHP</h1>";

        echo "<h2>Operatori dodjele</h2>";

        $broj=10;
        echo "<br>Broj: $broj";
        $temp = $broj;
        $broj=20;
        echo "<br>Broj: $broj";
        echo "<br>Broj prije nove dodijele imao je vrijednost: $temp";

        $a=5;
        $b=$a;
        $a=6;

        echo "<br>Vrijednost a: $a";
        echo "<br>Vrijednost b: $b";

        $a=5;
        $b = &$a;
        $a=6;

        echo "<br>Vrijednost a: $a";
        echo "<br>Vrijednost b: $b";

        echo "<h2>String operator (.)</h2>";
        $izraz = " iznosi ";
        $br1=10;
        $br2=5;
        //preko string operatora "." ispište sljedeće: Zbroj 10 i 5 iznosi 15.
        echo "<br>Zbroj ".$br1." i ".$br2.$izraz." ".($br1+$br2);
        echo "<br>Broj: ".$broj;

        echo "<h2>Aritmetički operatori</h2>";

        // $broj1 = 20;
        // $broj2 = 7;
        $broj1=rand(10,20);
        $broj2=rand(10,20);

        echo "<br>Broj1: ".$broj1;
        echo "<br>Broj2: ".$broj2;

        $rezultat = $broj1 + $broj2;
        echo "<br>Rezultat operatora + je: ".$rezultat;

        $rezultat = $broj1 - $broj2;
        echo "<br>Rezultat operatora - je: ".$rezultat;      

        $rezultat = $broj1 * $broj2;
        echo "<br>Rezultat operatora * je: ".$rezultat; 

        $rezultat = $broj1 / $broj2;
        echo "<br>Rezultat operatora / je: ".round($rezultat,3);
        
        $rezultat = $broj1 % $broj2;
        echo "<br>Rezultat operatora % je: ".$rezultat;
        
        echo "<h2>Inkrementacijski i dekrementacijski operatori</h2>";

        echo "<p>Operator var++</p>";
        $x1 = 5;
        echo '<br>Varijabla $x1 iznosi: '.$x1;
        echo '<br>Varijabla $x1++ iznosi: '.$x1++;
        echo '<br>Varijabla $x1 iznosi: '.$x1;
        echo '<br>Varijabla $x1++ iznosi: '.$x1++;
        echo '<br>Varijabla $x1++ iznosi: '.$x1++;

        echo "<p>Operator ++var</p>";
        $x2 = 20;
        echo '<br>Varijabla $x2 iznosi: '.$x2;
        echo '<br>Varijabla ++$x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++$x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++$x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++$x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++$x2 iznosi: '.++$x2;

        echo "<p>Operator var--</p>";
        $x3 = 30;
        echo '<br>Varijabla $x3 iznosi: '.$x3;
        echo '<br>Varijabla $x3-- iznosi: '.$x3--;
        echo '<br>Varijabla $x3-- iznosi: '.$x3--;
        echo '<br>Varijabla $x3-- iznosi: '.$x3--;

        echo "<p>Operator --var</p>";
        $x4 = 40;
        echo '<br>Varijabla $x4 iznosi: '.$x4;
        echo '<br>Varijabla --$x4 iznosi: '.--$x4;
        echo '<br>Varijabla --$x4 iznosi: '.--$x4;
        echo '<br>Varijabla --$x4 iznosi: '.--$x4;

        echo "<h2>Kombinirani operator dodjele</h2>";

        $a = 10;
        $b = 15;
        $a = $a + $b;
        echo "<br>A iznosi: ".$a;
        $a+=$b;//$a = $a + $b;
        echo "<br>A iznosi: ".$a;
        $c=20;
        $d=40;
        $c*=$d;
        echo "<br>".$c;
        /*
        kombinirati se mogu -, /, %, .
        */

        echo "<h2>Logički operatori</h2>";

        echo "<h3>Operator AND</h3>";
            /*
    0-LAŽ (FALSE)
    1-ISTINA (TRUE)

        ULAZ1		ULAZ2		REZULTAT
        1			  1             1
        1			  0             0
        0			  1             0	  
        0			  0             0	  
    */

      $br1=10;
      $br2=5;
      
      $rez = $br1 > 4;
      echo "<br>Rezultat: ".$rez;
      echo "<br>Tip:";
      var_dump($rez);
    //   var_dump($d);
    //   $grad="Zagreb";
    //   var_dump($grad);
      $rez = $br1 < 3;
      echo "<br>Rezultat: ".(int)$rez;
      echo "<br>Tip:";
      var_dump($rez);

      $rez = ($br1>4 && $br2>4);
      echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

      $rez = ($br1>5 && $br2>5);
      echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

      //dali su oba broja parna?
      $rez = ($br1%2==0 && $br2%2==0);
      echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

      echo "<h3>Operator OR</h3>";
        /*
        0-LAŽ (FALSE)
        1-ISTINA (TRUE)

            ULAZ1		ULAZ2		REZULTAT
            1			  1             1
            1			  0             1
            0			  1             1	  
            0			  0             0	  
        */

        $br1=10;
        $br2=18;

        $br1=rand(10,20);
        $br2=rand(10,20);
        echo "<br>Brojevi su: ".$br1." i ".$br2;

        $rez = ($br1>12 || $br2>12);//dvije ravne linije || - kombinacija Alt Gr i W
        echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

        $rez = ($br1>12 || $br2<5);//dvije ravne linije || - kombinacija Alt Gr i W
        echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

        //dali je ijedan paran broj?
        $rez = ($br1%2==0 || $br2%2==0);
        echo "<br>Rezultat: ".(int)$rez; echo "<br>Tip:"; var_dump($rez);

        echo "<h3>Operator NOT</h3>";
            /*
        !0-ISTINA (TRUE)
        !1-LAŽ (FALSE)
        */

        echo '<br>Varijabla $drzava je postavljena: '; echo var_dump(isset($drzava));
        echo '<br>Varijabla $drzava nije postavljena: '; echo var_dump(!isset($drzava));

        echo '<br>Varijabla $rez je postavljena: '; echo var_dump(isset($rez));
        echo '<br>Varijabla $rez nije postavljena: '; echo var_dump(!isset($rez));

        $indikator=true;
        echo "<br>Not indikator: ";
        var_dump(!$indikator);

        $ulica = "Perina 2";
        echo "<br>Varijabla ulica postavljena: ";
        echo var_dump(isset($ulica));
        echo "<br>Varijabla auto postavljena: ";
        echo var_dump(isset($auto));

        echo "<h2>Operatori usporedbe</h2>";

        $broj1=rand(8,12);
        $broj2=rand(8,12);

        echo "<br>Broj1: ".$broj1;
        echo "<br>Broj2: ".$broj2;
        ?>

        <ul>
            <li>Operator >: <?php echo "($broj1 > $broj2): "; echo var_dump($broj1>$broj2)?></li>
            <li>Operator <: <?php echo "($broj1 < $broj2): "; echo var_dump($broj1<$broj2)?></li>
            <li>----------------------------------------------------------------------------</li>
            <li>Operator >=: <?php echo "($broj1 >= $broj2): "; echo var_dump($broj1>=$broj2)?></li>
            <li>Operator <=: <?php echo "($broj1 <= $broj2): "; echo var_dump($broj1<=$broj2)?></li>
            <li>----------------------------------------------------------------------------</li>
            <?php
            $broj1=5;
            $broj2="5";
            echo "<br>Broj 1 tip: "; echo var_dump($broj1);
            echo "<br>Broj 2 tip: "; echo var_dump($broj2);
            ?>
            <li>Operator ==: <?php echo "($broj1 == $broj2): "; echo var_dump($broj1==$broj2)?></li>
            <li>Operator !=: <?php echo "($broj1 != $broj2): "; echo var_dump($broj1!=$broj2)?></li>
            <li>----------------------------------------------------------------------------</li>
            <?php 
            $broj2=(int)$broj2;
            echo "<br>Broj 2 tip: "; echo var_dump($broj2);
            ?>  
            <li>Operator ===: <?php echo "($broj1 === $broj2): "; echo var_dump($broj1===$broj2)?></li>
            <li>Operator !==: <?php echo "($broj1 !== $broj2): "; echo var_dump($broj1!==$broj2)?></li>
            <li>----------------------------------------------------------------------------</li>            
        </ul>
    </body>
</html>