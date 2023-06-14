<?php

namespace App\Controllers;

class ApiController extends BaseController
{


  public function getAPI()
  {
    $url = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";
    $password = md5(getEnv('API_PASS'));
    $username = getEnv('API_USERNAME');
    $data = "username=$username&password=$password";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $response = json_decode($result, true);

    if ($response['error'] == 0) {
      $this->_saveToDatabase($response['data']);
    } else {
      echo $response['ket'] . ' file env';
    }
  }

  private function _saveToDatabase($data)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('product');

    if ($builder->countAll() === 0) {
      foreach ($data as $key => $val) {
        $builder->insert([
          'nama_produk' => $val['nama_produk'],
          'kategori' => $val['kategori'],
          'harga' => $val['harga'],
          'status' => $val['status'],
        ]);
      }
      // $builder->insertBatch($data);
    }
  }
}
