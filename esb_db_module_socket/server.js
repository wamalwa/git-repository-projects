'use strict';

const express = require('express');
let app = express();

let server = require('http').Server(app);
const io = require('socket.io')(server);
const Queue = require('bull');

const Arena = require('bull-arena');
const validations = require('./utilities/validations');

const port = 3100;
server.listen(port);

const queue_manager = require('./queue-manager');

/*
let balanceEnquiryQueue = queue_manager.queues.ba;
let loanEnquiryQueue = new Queue('loan_enquiry');
let responseQueue = new Queue("Server");
*/

const arenaOptions = {basePath: '/arena', disableListen: true};

var queues = queue_manager.queues;

const arena = Arena({queues}, arenaOptions);

app.use(arena);

console.log('Socket Server Listening at port ' + port);
//console.log('Trying to load balance enquiry module ...');

io.on('connection', function (client) {

    console.log('a user connected...');

    client.on('client_request', (requestString) => {

        let request_params = JSON.parse(requestString);

        //@ToDo Determine whose request it is, the write it to their Job Queue
        console.log('Request Received');

        io.emit('db_socket', request_params);

    });

    client.on('db_response', (requestString) => {

        console.log('Response Received');

        io.emit('client_response', requestString);

    });

});


queue_manager.queuesDetails.responseQueue.queue.process(function (job, done) {
    console.log("Received Job", job.data);
    done();

});

queue_manager.queuesDetails.responseQueue.queue.on('completed', function (job) {
    console.log("Job Complete", job.data);
    io.emit('response', job.data);
    job.remove();

});

function generateTransactionReference() {

    return Math.floor(Date.now() + Math.random());
}
