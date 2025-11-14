<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Get search parameters from query string
        $search = $this->request->getQuery('search');
        $status = $this->request->getQuery('status');
        $partner = $this->request->getQuery('partner');
        $dateFrom = $this->request->getQuery('date_from');
        $dateTo = $this->request->getQuery('date_to');

        // Start building the query
        $query = $this->Events->find()
            ->contain(['PartnerOrganisations', 'EventsVolunteers']);

        // Apply search filter if provided
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Events.title LIKE' => '%' . $search . '%',
                    'Events.location LIKE' => '%' . $search . '%',
                    'Events.host LIKE' => '%' . $search . '%',
                    'Events.contact_name LIKE' => '%' . $search . '%',
                    'Events.description LIKE' => '%' . $search . '%',
                    'Events.required_skills LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Apply status filter if provided
        if (!empty($status) && $status !== 'all') {
            $query->where(['Events.status' => $status]);
        }

        // Apply partner filter if provided
        if (!empty($partner)) {
            $query->where(['Events.partner_organisation_id' => $partner]);
        }

        // Apply date range filter if provided
        if (!empty($dateFrom)) {
            $query->where(['Events.event_date >=' => $dateFrom]);
        }
        if (!empty($dateTo)) {
            $query->where(['Events.event_date <=' => $dateTo]);
        }

        // Configure pagination
        $this->paginate = [
            'limit' => 20,
            'order' => ['Events.event_date' => 'DESC']
        ];

        $events = $this->paginate($query);

        // Get data for filter dropdowns
        $partnerOrganisations = $this->Events->PartnerOrganisations->find('list')->order(['business_name' => 'ASC']);
        $statuses = [
            'Preparing' => 'Preparing',
            'Ready to go' => 'Ready to go', 
            'Archive' => 'Archive',
            'Failed' => 'Failed'
        ];

        $this->set(compact('events', 'partnerOrganisations', 'statuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['PartnerOrganisations', 'EventsVolunteers' => ['Volunteers']],
        ]);

        $this->set(compact('event'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEmptyEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $partnerOrganisations = $this->Events->PartnerOrganisations->find('list', ['limit' => 200])->all();
        $this->set(compact('event', 'partnerOrganisations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $partnerOrganisations = $this->Events->PartnerOrganisations->find('list', ['limit' => 200])->all();
        $this->set(compact('event', 'partnerOrganisations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}