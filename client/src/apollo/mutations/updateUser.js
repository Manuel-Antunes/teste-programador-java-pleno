import { gql } from "@apollo/client/core"

export const updateUser = gql`
    mutation UpdateUser($name: String!, $email: String!, $cpf: String!, $phone_number: String!) {
        updateUser(user_name: $name, email:$email, cpf: $cpf, phone_number: $phone) {
            user_name 
            email
            cpf
            phone_number
        }
    }
`