
export default {
    handle (error) {

        let message = error.response.data.message;

        if(422 === error.response.status) {

            let errors = error.response.data.errors;

            for (let id in errors) {

                let span = document.createElement('span');
                span.className = 'error';
                span.innerHTML = errors[id][0];

                let input = document.getElementById(id);

                input.parentNode.insertBefore(span, input.nextSibling);
            }
        }

    },

    clear() {

        let elements = document.getElementsByClassName('error'), index;

        for (index = elements.length - 1; index >= 0; index--) {
            elements[index].parentNode.removeChild(elements[index]);
        }
    }
};
