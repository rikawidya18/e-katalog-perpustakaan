<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ModelKategori;
use App\Models\ModelPengarang;
use App\Models\ModelPenerbit;
use App\Models\ModelRak;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */

    protected $ModelKategori;
    protected $ModelPengarang;
    protected $ModelPenerbit;
    protected $ModelRak;
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->ModelKategori = new ModelKategori();
        $this->ModelPengarang = new ModelPengarang();
        $this->ModelPenerbit = new ModelPenerbit();
        $this->ModelRak = new ModelRak();
    }

    protected function getOrCreateKategori($nama)
    {
        $kategori = $this->ModelKategori->GetByNama($nama);

        if ($kategori) {
            return $kategori['id_kategori'];
        }

        return $this->ModelKategori->InsertGetId([
            'nama_kategori' => $nama
        ]);
    }

    protected function getOrCreatePengarang($nama)
    {
        $pengarang = $this->ModelPengarang->GetByNama($nama);

        if ($pengarang) {
            return $pengarang['id_pengarang'];
        }

        return $this->ModelPengarang->InsertGetId([
            'nama_pengarang' => $nama
        ]);
    }

    protected function getOrCreatePenerbit($nama)
    {
        $penerbit = $this->ModelPenerbit->GetByNama($nama);

        if ($penerbit) {
            return $penerbit['id_penerbit'];
        }

        return $this->ModelPenerbit->InsertGetId([
            'nama_penerbit' => $nama
        ]);
    }

    protected function getOrCreateRak($nama)
    {
        $rak = $this->ModelRak->GetByNama($nama);

        if ($rak) {
            return $rak['id_rak'];
        }

        return $this->ModelRak->InsertGetId([
            'nama_rak' => $nama
        ]);
    }
}