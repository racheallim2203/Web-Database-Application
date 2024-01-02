<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Questionnaires Controller
 *
 * @property \App\Model\Table\QuestionnairesTable $QuestionnairesTable
 */

class QuestionnairesController extends AppController
{

    public function index()
    {
        $query = $this->Questionnaires->find()
            ->contain(['Projects'])
            ->order(['ques_serial' => 'ASC']);

        if ($this->request->getQuery('business_name')) {
            $keyword = $this->request->getQuery('business_name');

            // Use the LIKE condition to search for partial matches
            $query->where(['business_name LIKE' => '%' . $keyword . '%']);
        }

        if ($this->request->getQuery('completion_time')) {
            $query->where(['completion_time' => $this->request->getQuery('completion_time')]);
        }

        // Fetch the questionnaire data and set it in the view
        $questionnaires = $this->paginate($query);
        $this->set(compact('questionnaires'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function add()
    {
        // Create a new empty Questionnaires entity
        $questionnaire = $this->Questionnaires->newEmptyEntity();

        // Load a list of existing project serials from the Project table
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $projectSerials = $projectsTable->find('list', [
            'keyField' => 'project_serial',
            'valueField' => 'project_serial',
            'order' => ['project_serial' => 'ASC']
        ])->toArray();

        // Add a default "Select Project" option
        $projectSerials = ['' => '== Select Project =='] + $projectSerials;

        if ($this->request->is('post')) {
            // If the request is a POST (form submission), attempt to save the data
            $questionnaire = $this->Questionnaires->patchEntity($questionnaire, $this->request->getData());
            if ($this->Questionnaires->save($questionnaire)) {
                // Redirect to the index page or show a success message
                $this->Flash->success(__('The questionnaire has been added.'));

                return $this->redirect(['action' => 'index']);
            } else {
                // If saving fails, display validation errors
                $this->Flash->error(__('Unable to add the questionnaire. Please, try again.'));
            }
        }

        // Pass the $questionnaire variable to the view
        $this->set(compact('questionnaire', 'projectSerials'));
    }

    public function view($ques_serial = null) {
        // Check if $id is null or not numeric
        if (!$ques_serial || !is_numeric($ques_serial)) {
            // Handle the case where $id is invalid, e.g., show an error message
            $this->Flash->error(__('Invalid Questionnaire'));
            return $this->redirect(['action' => 'index']);
        }

        // Load the questionnaire based on $ques_serial
        $questionnaire = $this->Questionnaires->get($ques_serial);

        // Pass the questionnaire data to the view template
        $this->set('questionnaire', $questionnaire);
    }

    public function edit($quesSerial = null)
    {
        $questionnaire = $this->Questionnaires->get($quesSerial);
        if ($this->request->is(['post', 'put'])) {
            $this->Questionnaires->patchEntity($questionnaire, $this->request->getData());
            if ($this->Questionnaires->save($questionnaire)) {
                $this->Flash->success(__('The questionnaire has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the questionnaire.'));
        }

        $this->set('questionnaire', $questionnaire);
    }

    /**
     * Delete method
     *
     * @param string|null $quesSerial Questionnaire id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($quesSerial = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionnaire = $this->Questionnaires->get($quesSerial);
        if ($this->Questionnaires->delete($questionnaire)) {
            $this->Flash->success(__('The questionnaire has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete the questionnaire.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
