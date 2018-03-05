var socket = require('socket.io-client')('http://localhost:3100');
var validations = require('./utilities/validations');

console.log('Client Started');

socket.on('connect', () => {
    console.log(socket.id);
    console.log('Requesting balance');
    console.time('BI');

    let request_params = {
        metadata: {
            transtype: 'GETACCOUNTDETAILS'
        },
        payload: {CUSTOMERNO : '254702818290'
        }
    };

    //let payload = {'action' : validations.ACTIONS.BI.name};

    console.log(request_params.payload);

    socket.emit('client_request', JSON.stringify( request_params));

});

socket.on('client_response', (response) => {
    console.timeEnd('BI');

    console.log('Received response');
    console.log(response);
});

