<?php

use yii\db\Migration;

/**
 * Class m240806_073529_create_junction_article_and_category
 */
class m240806_073529_create_junction_article_and_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('junction',
            [
                'id_category' => $this->integer(),
                'id_article' => $this->integer(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('junction');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240806_073529_create_junction_article_and_category cannot be reverted.\n";

        return false;
    }
    */
}
