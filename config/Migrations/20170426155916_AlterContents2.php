<?php
use Migrations\AbstractMigration;

class AlterContents2 extends AbstractMigration
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
        $table-> addColumn ('type', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table-> addColumn ('sequence_in_page', 'integer', [
            'default' => null,
            'limit'   => 8,
            'null'    => false
        ]);
        $table->update();
    }
}
