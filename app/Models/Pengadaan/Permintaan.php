<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'tanggal',
        'noform',
        'kabag',
        'keteranganform',
        'foto',
        'dibuat',
    ];

    public function getMesinBaru($id)
    {
        $this->db->select('mesin');
        $this->db->from("gd_mastermesin me");
        $this->db->join('gd_mastermesinitm mi', 'me.id=mi.id_mesin', 'left');
        $this->db->where('id_mesitm', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->mesin;
        }
        return $query;
    }

    public function getMerkBaru($id)
    {
        $this->db->select('merk');
        $this->db->from("gd_mastermesin me");
        $this->db->join('gd_mastermesinitm mi', 'me.id=mi.id_mesin', 'left');
        $this->db->where('id_mesitm', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->merk;
        }
        return $query;
    }
}
