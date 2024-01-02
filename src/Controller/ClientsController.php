<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $ClientsTable
 */

class ClientsController extends AppController
{

    public function index()
    {
        $query = $this->Clients->find()
            ->order(['client_serial' => 'ASC']);

        // Check if any filter parameters are present in the request
        if ($this->request->getQuery('first_name')) {
            $query->where(['first_name' => $this->request->getQuery('first_name')]);
        }
        if ($this->request->getQuery('surname')) {
            $query->where(['surname' => $this->request->getQuery('surname')]);
        }
        if ($this->request->getQuery('address')) {
            $query->where(['address' => $this->request->getQuery('address')]);
        }

        $clients = $this->paginate($query);

        $this->set(compact('clients'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function add()
    {
        // Create a new empty Client entity
        $client = $this->Clients->newEmptyEntity();

        if ($this->request->is('post')) {
            // If the request is a POST (form submission), attempt to save the data
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                // Redirect to the index page or show a success message
                $this->Flash->success(__('The client has been added.'));

                return $this->redirect(['action' => 'index']);
            } else {
                // If saving fails, display validation errors
                $this->Flash->error(__('Unable to add the client. Please, try again.'));
            }
        }

        // Pass the $project variable to the view
        $this->set(compact('client'));
    }

    public function view($client_serial = null) {
        // Check if $id is null or not numeric
        if (!$client_serial || !is_numeric($client_serial)) {
            // Handle the case where $id is invalid, e.g., show an error message
            $this->Flash->error(__('Invalid client'));
            return $this->redirect(['action' => 'index']);
        }

        // Load the client based on $client_serial
        $client = $this->Clients->get($client_serial);

        // Pass the client data to the view template
        $this->set('client', $client);
    }

    public function edit($client_serial = null)
    {
        $client = $this->Clients->get($client_serial);
        if ($this->request->is(['post', 'put'])) {
            $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the client.'));
        }

        $this->set('client', $client);
    }

    /**
     * Delete method
     *
     * @param string|null $client_serial Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($client_serial = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($client_serial);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete the client.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

