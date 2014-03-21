<?php

class m140320_230611_urls_table extends CDbMigration {

    public function up() {
        $this->execute("
            CREATE TABLE `urls` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `url` text NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB;
            ");
    }

    public function down() {
        echo "m140320_230611_urls_table does not support migration down.\n";
        return false;
    }

}
