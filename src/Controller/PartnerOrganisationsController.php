<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PartnerOrganisations Controller
 *
 * @property \App\Model\Table\PartnerOrganisationsTable $PartnerOrganisations
 */
class PartnerOrganisationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Get search parameters
        $search = $this->request->getQuery('search');
        $industry = $this->request->getQuery('industry');

        // Start building query
        $query = $this->PartnerOrganisations->find()
            ->contain(['Events']);

        // Apply search filter
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'PartnerOrganisations.business_name LIKE' => '%' . $search . '%',
                    'PartnerOrganisations.contact_name LIKE' => '%' . $search . '%',
                    'PartnerOrganisations.contact_email LIKE' => '%' . $search . '%',
                    'PartnerOrganisations.industry LIKE' => '%' . $search . '%',
                    'PartnerOrganisations.help_description LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Apply industry filter
        if (!empty($industry)) {
            $query->where(['PartnerOrganisations.industry LIKE' => '%' . $industry . '%']);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => ['PartnerOrganisations.business_name' => 'ASC']
        ];

        $partnerOrganisations = $this->paginate($query);

        // Get unique industries for filter dropdown
        $industries = $this->PartnerOrganisations->find()
            ->select(['industry'])
            ->where(['industry IS NOT' => null])
            ->distinct(['industry'])
            ->order(['industry' => 'ASC'])
            ->all()
            ->combine('industry', 'industry')
            ->toArray();

        $this->set(compact('partnerOrganisations', 'industries'));
    }

    /**
     * View method
     *
     * @param string|null $id Partner Organisation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partnerOrganisation = $this->PartnerOrganisations->get($id, [
            'contain' => ['Events'],
        ]);

        $this->set(compact('partnerOrganisation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partnerOrganisation = $this->PartnerOrganisations->newEmptyEntity();
        if ($this->request->is('post')) {
            $partnerOrganisation = $this->PartnerOrganisations->patchEntity($partnerOrganisation, $this->request->getData());
            if ($this->PartnerOrganisations->save($partnerOrganisation)) {
                $this->Flash->success(__('The partner organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner organisation could not be saved. Please, try again.'));
        }
        $this->set(compact('partnerOrganisation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner Organisation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partnerOrganisation = $this->PartnerOrganisations->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partnerOrganisation = $this->PartnerOrganisations->patchEntity($partnerOrganisation, $this->request->getData());
            if ($this->PartnerOrganisations->save($partnerOrganisation)) {
                $this->Flash->success(__('The partner organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner organisation could not be saved. Please, try again.'));
        }
        $this->set(compact('partnerOrganisation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner Organisation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partnerOrganisation = $this->PartnerOrganisations->get($id);
        if ($this->PartnerOrganisations->delete($partnerOrganisation)) {
            $this->Flash->success(__('The partner organisation has been deleted.'));
        } else {
            $this->Flash->error(__('The partner organisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}