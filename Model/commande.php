<?php
class cmd
{
    public string $date_cmd;
    public int $qte_cmd;
    public int $id_med;
    public int $user_id;

    public function __construct($qte_cmd, $id_med, $user_id)
    {
        //$this->date_cmd = $date_cmd;
        $this->qte_cmd = $qte_cmd;
        $this->id_med = $id_med;
        $this->user_id = $user_id;
    }

    public function setdate_cmd($date_cmd)
    {
        $this->date_cmd = $date_cmd;
    }

    public function setqte_cmd($qte_cmd)
    {
        $this->qte_cmd = $qte_cmd;
    }

    public function get_date_cmd(): string
    {
        return $this->date_cmd;
    }

    public function get_qte_cmd(): int
    {
        return $this->qte_cmd;
    }
}
class pann
{
    public int $id_p;
    public int $id_cmd;
    public int $id_med;
    public int $qte_med;
    public function __construct($id_cmd, $id_med, $qte_med)
    {
        $this->id_med = $id_med;
        $this->id_cmd = $id_cmd;
        $this->qte_med = $qte_med;
    }
}
