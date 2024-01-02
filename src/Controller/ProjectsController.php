<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $ProjectsTable
 */

class ProjectsController extends AppController
{

    public function index()
    {
        $query = $this->Projects->find()
            ->contain(['Clients'])
            ->order(['project_serial' => 'ASC']);

        // Check if any filter parameters are present in the request
        if ($this->request->getQuery('semester')) {
            $semester = $this->request->getQuery('semester');

            // Use the LIKE condition to search for partial matches
            $query->where(['semester LIKE' => '%' . $semester . '%']);
        }

        if ($this->request->getQuery('status')) {
            $query->where(['status' => $this->request->getQuery('status')]);
        }
        if ($this->request->getQuery('level_of_necessity')) {
            $query->where(['level_of_necessity' => $this->request->getQuery('level_of_necessity')]);
        }
        if ($this->request->getQuery('meet_and_greet')) {
            $query->where(['meet_and_greet' => $this->request->getQuery('meet_and_greet')]);
        }

        $projects = $this->paginate($query);

        $this->set(compact('projects'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function add()
    {
        // Create a new empty Project entity
        $project = $this->Projects->newEmptyEntity();

        // Load a list of existing client serials from the Clients table
        $clientsTable = TableRegistry::getTableLocator()->get('Clients');
        $clientSerials = $clientsTable->find('list', [
            'keyField' => 'client_serial',
            'valueField' => 'client_serial',
            'order' => ['client_serial' => 'ASC']
        ])->toArray();

        // Add a default "Select Client" option
        $clientSerials = ['' => '== Select Client =='] + $clientSerials;

        if ($this->request->is('post')) {
            // If the request is a POST (form submission), attempt to save the data
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                // Redirect to the index page or show a success message
                $this->Flash->success(__('The project has been added.'));

                return $this->redirect(['action' => 'index']);
            } else {
                // If saving fails, display validation errors
                $this->Flash->error(__('Unable to add the project. Please, try again.'));
            }
        }

        // Pass the $project and $clientSerials variables to the view
        $this->set(compact('project', 'clientSerials'));
    }

    public function view($project_serial = null) {
        // Check if $id is null or not numeric
        if (!$project_serial || !is_numeric($project_serial)) {
            // Handle the case where $id is invalid, e.g., show an error message
            $this->Flash->error(__('Invalid project'));
            return $this->redirect(['action' => 'index']);
        }

        // Load the project based on $project_serial
        $project = $this->Projects->get($project_serial);

        // Pass the project data to the view template
        $this->set('project', $project);
    }

    public function edit($projectSerial = null)
    {
        $project = $this->Projects->get($projectSerial);
        if ($this->request->is(['post', 'put'])) {
            $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the project.'));
        }

        $this->set('project', $project);
    }

    /**
     * Delete method
     *
     * @param string|null $projectSerial Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($projectSerial = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($projectSerial);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete the project.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
