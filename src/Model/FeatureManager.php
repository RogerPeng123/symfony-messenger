<?php


namespace App\Model;


use App\Entity\Reference\Feature;

interface FeatureManager
{
    public function createFeature(Feature $feature): ?Feature;
}