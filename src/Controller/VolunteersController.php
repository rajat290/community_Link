<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Volunteers Controller
 *
 * @property \App\Model\Table\VolunteersTable $Volunteers
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VolunteersController extends AppController
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
        $skill = $this->request->getQuery('skill');
        $availability = $this->request->getQuery('availability');

        // Start building the query
        $query = $this->Volunteers->find()
            ->contain(['Skills']); // Include related skills

        // Apply search filter if provided
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Volunteers.first_name LIKE' => '%' . $search . '%',
                    'Volunteers.last_name LIKE' => '%' . $search . '%',
                    'Volunteers.email LIKE' => '%' . $search . '%',
                    'Volunteers.phone LIKE' => '%' . $search . '%',
                    'Volunteers.self_intro LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Apply skill filter if provided
        if (!empty($skill)) {
            $query->matching('Skills', function ($q) use ($skill) {
                return $q->where([
                    'OR' => [
                        'Skills.name LIKE' => '%' . $skill . '%',
                        'Skills.id' => $skill
                    ]
                ]);
            });
        }

        // Apply availability filter if provided
        if (!empty($availability)) {
            $query->where(['Volunteers.availability LIKE' => '%' . $availability . '%']);
        }

        // Configure pagination
        $this->paginate = [
            'limit' => 20,
            'order' => ['Volunteers.first_name' => 'ASC']
        ];

        $volunteers = $this->paginate($query);

        // Get skills for filter dropdown
        $skills = $this->Volunteers->Skills->find('list')->order(['name' => 'ASC']);

        $this->set(compact('volunteers', 'skills'));
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteer = $this->Volunteers->get($id, [
            'contain' => ['Skills', 'Documents', 'EventsVolunteers' => ['Events']],
        ]);

        $this->set(compact('volunteer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteer = $this->Volunteers->newEmptyEntity();
        if ($this->request->is('post')) {
            $volunteer = $this->Volunteers->patchEntity($volunteer, $this->request->getData());
            if ($this->Volunteers->save($volunteer)) {
                $this->Flash->success(__('The volunteer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The volunteer could not be saved. Please, try again.'));
        }
        $skills = $this->Volunteers->Skills->find('list', ['limit' => 200])->all();
        $this->set(compact('volunteer', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteer = $this->Volunteers->get($id, [
            'contain' => ['Skills'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteer = $this->Volunteers->patchEntity($volunteer, $this->request->getData());
            if ($this->Volunteers->save($volunteer)) {
                $this->Flash->success(__('The volunteer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The volunteer could not be saved. Please, try again.'));
        }
        $skills = $this->Volunteers->Skills->find('list', ['limit' => 200])->all();
        $this->set(compact('volunteer', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteer = $this->Volunteers->get($id);
        if ($this->Volunteers->delete($volunteer)) {
            $this->Flash->success(__('The volunteer has been deleted.'));
        } else {
            $this->Flash->error(__('The volunteer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Public registration method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function publicRegister()
    {
        $volunteer = $this->Volunteers->newEmptyEntity();
        
        if ($this->request->is('post')) {
            // Set the submission date
            $data = $this->request->getData();
            $data['date_submitted'] = \Cake\I18n\Date::now();
            
            $volunteer = $this->Volunteers->patchEntity($volunteer, $data);
            
            if ($this->Volunteers->save($volunteer)) {
                $this->Flash->success(__('Thank you for your registration! We will contact you soon.'));

                return $this->redirect(['action' => 'publicRegister']);
            }
            $this->Flash->error(__('There was an error with your registration. Please try again.'));
        }
        
        $skills = $this->Volunteers->Skills->find('list', ['limit' => 200])->all();
        $this->set(compact('volunteer', 'skills'));
    }

    /**
     * Upload document method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Redirects on successful upload, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function uploadDocument($id = null)
    {
        $volunteer = $this->Volunteers->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            // Handle file upload
            if (!empty($data['document_file'])) {
                $file = $data['document_file'];
                
                // Check if file was uploaded without errors
                if ($file->getError() === UPLOAD_ERR_OK) {
                    // Generate unique filename
                    $filename = time() . '_' . $file->getClientFilename();
                    $uploadPath = WWW_ROOT . 'files' . DS . 'documents' . DS . $filename;
                    
                    // Move uploaded file
                    if ($file->moveTo($uploadPath)) {
                        // Create document record
                        $document = $this->Volunteers->Documents->newEmptyEntity();
                        $document->volunteer_id = $id;
                        $document->file_path = $filename;
                        $document->doc_type = $data['doc_type'] ?? 'Document';
                        
                        if ($this->Volunteers->Documents->save($document)) {
                            $this->Flash->success(__('The document has been uploaded successfully.'));
                            return $this->redirect(['action' => 'view', $id]);
                        } else {
                            $this->Flash->error(__('The document could not be saved. Please, try again.'));
                        }
                    } else {
                        $this->Flash->error(__('Failed to move uploaded file.'));
                    }
                } else {
                    $this->Flash->error(__('File upload error. Please try again.'));
                }
            } else {
                $this->Flash->error(__('Please select a file to upload.'));
            }
        }
        
        $this->set(compact('volunteer'));
    }
}