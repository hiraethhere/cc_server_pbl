<?php

class t_20251204_01_create_trigger_suspend extends Migration{
    public function up()
    {
        $trigger = "CREATE TRIGGER trg_suspend_user
                    BEFORE UPDATE ON users
                    FOR EACH ROW
                    BEGIN
                        IF (NEW.suspend_count <> OLD.suspend_count) AND (NEW.suspend_count >= 3) THEN
                            SET NEW.status = 'suspended';
                        END IF;
                    END;";
        $this->db->query($trigger);
        $this->db->execute();
    }
}