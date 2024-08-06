<?php

namespace App\Livewire\Pages\Report;

use App\Models\Report;
use Livewire\Component;
use App\Jobs\GenerateReport;

class ReportPage extends Component
{
    public function render()
    {
        return view('livewire.pages.report.report-page');
    }

    public function createReport()
    {
        $reportId = $this->saveReport();

        GenerateReport::dispatch($reportId, $this->startDate, $this->endDate);
        $this->alert('info', 'Generating report', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
        $this->reset(['startDate', 'endDate']);
    }

    public function saveReport()
    {
        $report = new Report([
            "name" => "Generating name",
            "file" => "Generating report"
        ]);
        $report->save();

        return $report->id;
    }
}
