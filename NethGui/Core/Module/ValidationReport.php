<?php

final class NethGui_Core_Module_ValidationReport extends NethGui_Core_Module_Standard {

    /**
     *
     * @var NethGui_Core_ValidationReportInterface
     */
    private $report;


    public function __construct(NethGui_Core_ValidationReportInterface $report)
    {
        parent::__construct();
        $this->report =$report;
    }

    public function prepareView(NethGui_Core_ViewInterface $response)
    {
        $this->parameters['errors'] = array();
        foreach($this->report->getErrors() as $error)
        {
            list($fieldId, $message, $module) = $error;
            //$this->parameters['errors'][$fieldId] = $message;
            $this->parameters['errors'][] = array($fieldId, $message);
        }
        
        parent::prepareView($response);
    }
}