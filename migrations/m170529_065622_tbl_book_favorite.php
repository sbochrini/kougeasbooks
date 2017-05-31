<?php

use yii\db\Migration;

class m170529_065622_tbl_book_favorite extends Migration
{
    public function up()
    {
        $this->addColumn('tbl_book', 'bk_favorite', 'INT(11) DEFAULT \'0\' AFTER bk_image_web_filename');
    }

    public function down()
    {
       // echo "m170529_065622_tbl_book_favorite cannot be reverted.\n";
        $this->dropColumn('tbl_book', 'bk_favorite');
        //return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
