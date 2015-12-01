<?php



$test = new test();
$test->valid();

class test
{
    public function valid()
    {
        $con = mysql_connect("localhost:3306","root","xxx333");
        if (!$con)
        {
          die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("wxtest", $con);

        // some code
        mysql_query("insert into wx_article_data(ref_date) values(22);");
        mysql_close($con);

    }
}
?>