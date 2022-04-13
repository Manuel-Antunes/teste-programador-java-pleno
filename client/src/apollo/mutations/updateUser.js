import { gql } from "@apollo/client/core"

export const updateUser = ({name, email, cpf, phone}) => {
    return {
        mutation: gql`
            mutation {
                updateUser(user_name: "${name}", email: "${email}", cpf: "${cpf}", phone_number: "${phone}") 
                    code
                    user_name
                    email
                    cpf
                    phone_number
                }  
            }
        `
    }
}