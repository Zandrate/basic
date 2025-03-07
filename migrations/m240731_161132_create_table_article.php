<?php
use yii\db\Migration;

/**
 * Class m240731_161132_article
 */
class m240731_161132_create_table_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article',
            [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'about' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }




    /*
    // Use up()/down() to run migration code without a transaction.

    public function down()
    {
        echo "m240731_161132_article cannot be reverted.\n";

        return false;
    }
    */
}
