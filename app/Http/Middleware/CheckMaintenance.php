<?php

namespace App\Http\Middleware;

use App\Services\MaintenanceService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenance
{

    private $maintenanceService;

    public function __construct(MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
    }

    /**
     * Middleware qui vérifie si la maintenance est activée
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $admin = ($user && $user->role == 'admin');

        if (!$admin && $this->maintenanceService->isEnabled()) {
            abort(503);
        }

        return $next($request);
    }
}
