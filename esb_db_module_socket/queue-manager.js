'use strict';

const Queue = require('bull');
const socket = require('socket.io-client')('http://localhost:3100');

const balanceEnquiryQueue = new Queue('balance_enquiry');
let loanEnquiryQueue = new Queue('loan_enquiry');
let responseQueue = new Queue("Server");
let test_concurrent_queue = new Queue("test concurrent queue");
let db_queue = new Queue("db_queue");

const queues =
    [
        {"hostId": "Bull", "name": "balance_enquiry"},
        {"hostId": "Bull", "name": "loan_enquiry"},
        {"hostId": "Bull", "name": "Server"},
        {"hostId": "Bull", "name": "test concurrent queue"},
        {"hostId": "Bull", "name": "db_queue"}
    ];

const queuesDetails =
    {
        balanceEnquiryQueue : {hostId: "Bull", name: "balance_enquiry", queue : balanceEnquiryQueue},
        loanEnquiryQueue : {hostId: "Bull", name: "loan_enquiry", queue : loanEnquiryQueue},
        responseQueue : {hostId: "Bull", name: "Server", queue : responseQueue},
        test_concurrent_queue: {hostId: "Bull", name: "test concurrent queue", queue : test_concurrent_queue},
        db_queue: {hostId: "Bull", name: "db_queue", queue : db_queue}
    };

socket.on('connect', () => {
    console.log(`Bull Responder ID ${socket.id} \nYou can control / Check health of the the Queue parameters from here`);
    console.log('Bull is waiting for Job ...');

});

module.exports = {queues, queuesDetails };