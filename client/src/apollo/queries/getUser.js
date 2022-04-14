import { gql } from "@apollo/client/core"

export const getUser = gql`
    query GetUser($code: String!){
        user(code: $code) {
            code
            user_name
            cpf
            phone_number
            email    
            orders {
            products {
                code
                name
                desc
                units
                price
            }
            number
            issue_date
            desc
            total_price
        }
  }  
}
`