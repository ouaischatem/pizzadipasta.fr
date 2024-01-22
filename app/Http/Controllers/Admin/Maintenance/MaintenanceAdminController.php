<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Http\Controllers\Controller;
use App\Services\MaintenanceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaintenanceAdminController extends Controller
{

    private MaintenanceService $maintenanceService;

    /**
     * Crée une nouvelle instance du contrôleur de la maintenance
     */
    public function __construct(MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la vue qui permet la gestion de l'état de la maintenance
     *
     * @return View
     */
    public function index()
    {
        $maintenanceEnabled = $this->maintenanceService->isEnabled();
        return view('admin.maintenance.index', compact('maintenanceEnabled'));
    }

    /**
     * Active ou désactive le mode maintenance en fonction de la demande
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function toggleMaintenance(Request $request)
    {
        $enabled = $request->has("enabled") && $request->input("enabled");
        $this->maintenanceService->setEnabled($enabled);
        return redirect()->route('admin.maintenance');
    }
}
