<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableRuangan extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('rooms', ['id' => 'id_room']);
        $table->addColumn('id_pengumuman', 'integer', ['signed' => false, 'null' => true])
                -> addForeignKey('id_pengumuman', 'pengumuman', 'id_pengumuman', [
                    'delete' => 'SET_NULL',
                    'update' => 'CASCADE'  
                ])
                ->addColumn('room_name', 'string')
                ->addColumn('room_img', 'string', ['null' => true])
                ->addColumn('description', 'text', ['null' => true])
                ->addColumn('short_description', 'string',['limit' => 101] )
                ->addColumn('floor', 'tinyinteger')
                ->addColumn('status', 'enum', [
                  'values' => ['active', 'non-active', 'deleted'],
                  'default' => 'active'
              ])
                ->addColumn('max_capacity', 'tinyinteger')
                ->addColumn('min_capacity', 'tinyinteger')
                ->addTimestamps()
                ->create();
    }
}
