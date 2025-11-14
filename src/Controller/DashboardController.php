<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $this->loadModel('EventsVolunteers');
        $this->loadModel('Events');
        $this->loadModel('VolunteersSkills');

        $year = date('Y');

        // Top 10 volunteers by number of events this year
        $topVols = $this->EventsVolunteers->find()
            ->select([
                'volunteer_id',
                'count' => 'COUNT(EventsVolunteers.event_id)'
            ])
            ->where(["YEAR(EventsVolunteers.created) =" => $year])
            ->group('volunteer_id')
            ->orderDesc('count')
            ->limit(10)
            ->contain(['Volunteers']);

        // Top 10 partner organisations by number of events this year
        $this->loadModel('PartnerOrganisations');
        $topPartners = $this->Events->find()
            ->select(['partner_organisation_id', 'count' => 'COUNT(Events.id)'])
            ->where(["YEAR(Events.created) =" => $year])
            ->group('partner_organisation_id')
            ->orderDesc('count')
            ->limit(10)
            ->contain(['PartnerOrganisations']);

        // Count volunteers per skill (uses volunteers_skills join)
        $skillCounts = $this->VolunteersSkills->find()
            ->select(['skill_id', 'count' => 'COUNT(volunteer_id)'])
            ->group('skill_id')
            ->contain(['Skills']);

        // Events counts next month by status
        $start = date('Y-m-d', strtotime('first day of next month'));
        $end = date('Y-m-d', strtotime('last day of next month'));
        $eventsCounts = $this->Events->find()
            ->select(['status', 'count' => 'COUNT(Events.id)'])
            ->where(['event_date >=' => $start, 'event_date <=' => $end])
            ->group('status');

        $this->set(compact('topVols', 'topPartners', 'skillCounts', 'eventsCounts', 'start', 'end'));
    }
}
