<?php

class Create_accounts_table
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        if ($this->_lava->dbforge->table_exists('accounts')) {
            return;
        }

        $this->_lava->dbforge
            ->add_field([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE],
                'firstname' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => FALSE],
                'lastname' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => FALSE],
                'username' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => FALSE],
                'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE],
                'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE],
                'role' => ['type' => 'ENUM', 'constraint' => "'admin','moderator','account'", 'null' => FALSE, 'default' => 'account'],
                'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE, 'default' => 1],
                'created_at' => ['type' => 'DATETIME', 'null' => FALSE, 'default' => 'CURRENT_TIMESTAMP'],
                'updated_at' => ['type' => 'DATETIME', 'null' => TRUE, 'default' => NULL],
            ])
            ->add_key('id', primary: TRUE)
            ->add_key('username', unique: TRUE, name: 'username_unique')
            ->add_key('email', unique: TRUE, name: 'email_unique')
            ->create_table('accounts');
    }

    public function down()
    {
        $this->_lava->dbforge->drop_table('accounts');
    }
}