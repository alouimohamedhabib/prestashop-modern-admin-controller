<?php


class Myyoutubemc extends Module
{
    public function __construct()
    {
        $this->name = "myyoutubemc";
        $this->tab  = "front_office_features";
        $this->version = "1.0";
        $this->author = "ALOUI Mohamed Habib";
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            "min" => "1.6",
            "max" => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l("Myyoutubemc");
        $this->description = $this->l("Myyoutubemc");
        $this->confirmUninstall = $this->l("Myyoutubemc");
    }

    // install method
    public function install()
    {
        return parent::install();
    }

    // uninstall method
    public function uninstall(): Bool
    {
        return parent::uninstall();
    }
}
