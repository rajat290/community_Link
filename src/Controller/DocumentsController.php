<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 */
class DocumentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Documents->find()
            ->contain(['Volunteers']);

        $this->paginate = [
            'limit' => 20,
            'order' => ['Documents.created' => 'DESC']
        ];

        $documents = $this->paginate($query);

        $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Volunteers'],
        ]);

        $this->set(compact('document'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Handle file upload
            if (!empty($data['document_file']) && $data['document_file']->getError() === UPLOAD_ERR_OK) {
                $file = $data['document_file'];

                // Generate unique filename
                $filename = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'files' . DS . 'documents' . DS;

                // Create directory if it doesn't exist
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $uploadPath .= $filename;

                // Move uploaded file
                if ($file->moveTo($uploadPath)) {
                    $data['file_path'] = $filename;
                    $data['name'] = $data['doc_type'] ?? 'Document';
                    $data['file_type'] = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));
                    $data['file_size'] = $file->getSize();
                } else {
                    $this->Flash->error(__('Failed to upload file. Please try again.'));
                    $volunteers = $this->Documents->Volunteers->find('list', ['limit' => 200])->all();
                    $this->set(compact('document', 'volunteers'));
                    return;
                }
            } else {
                $this->Flash->error(__('Please select a file to upload.'));
                $volunteers = $this->Documents->Volunteers->find('list', ['limit' => 200])->all();
                $this->set(compact('document', 'volunteers'));
                return;
            }
            
            // Remove file from data before patching entity
            unset($data['document_file']);
            
            $document = $this->Documents->patchEntity($document, $data);
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $volunteers = $this->Documents->Volunteers->find('list', ['limit' => 200])->all();
        $this->set(compact('document', 'volunteers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            // Handle file upload if new file is provided
            if (!empty($data['document_file']) && $data['document_file']->getError() === UPLOAD_ERR_OK) {
                $file = $data['document_file'];

                // Generate unique filename
                $filename = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'files' . DS . 'documents' . DS;

                // Create directory if it doesn't exist
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $uploadPath .= $filename;

                // Move uploaded file
                if ($file->moveTo($uploadPath)) {
                    // Delete old file if exists
                    $oldFile = WWW_ROOT . 'files' . DS . 'documents' . DS . $document->file_path;
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                    $data['file_path'] = $filename;
                    $data['name'] = $data['doc_type'] ?? $document->name ?? 'Document';
                    $data['file_type'] = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));
                    $data['file_size'] = $file->getSize();
                } else {
                    $this->Flash->error(__('Failed to upload file. Please try again.'));
                    $volunteers = $this->Documents->Volunteers->find('list', ['limit' => 200])->all();
                    $this->set(compact('document', 'volunteers'));
                    return;
                }
            }
            
            // Remove file from data before patching entity
            unset($data['document_file']);
            
            $document = $this->Documents->patchEntity($document, $data);
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $volunteers = $this->Documents->Volunteers->find('list', ['limit' => 200])->all();
        $this->set(compact('document', 'volunteers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
