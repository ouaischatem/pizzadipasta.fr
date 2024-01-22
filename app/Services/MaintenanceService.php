<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * Service de maintenance utilisant
 * le design pattern Singleton
 */
class MaintenanceService
{
    private static $instance;

    /**
     * Constructeur privé pour le Singleton
     */
    private function __construct()
    {
    }

    /**
     * Récupère l'instance MaintenanceService
     *
     * @return MaintenanceService
     */
    public static function getInstance(): MaintenanceService
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Vérifie si la maintenance est activée
     *
     * @return bool
     */

    public function isEnabled(): bool
    {
        return DB::table('maintenance')->where('is_enabled', true)->exists();
    }

    /**
     * Active ou désactive la maintenance
     *
     * @param bool $enable
     */

    public function setEnabled($enable)
    {
        DB::table('maintenance')->updateOrInsert([], ['is_enabled' => $enable]);
    }
}
