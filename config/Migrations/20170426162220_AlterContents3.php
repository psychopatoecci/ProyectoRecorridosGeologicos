<?php
use Migrations\AbstractMigration;

class AlterContents3 extends AbstractMigration
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
        $table -> renameColumn ('type', 'content_type');
        $table -> update();
    }
}
