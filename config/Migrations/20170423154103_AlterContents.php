<?php
use Migrations\AbstractMigration;

class AlterContents extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('contents');
        $table->renameColumn ('id_page', 'page_id');
        $table->update();
    }
}
