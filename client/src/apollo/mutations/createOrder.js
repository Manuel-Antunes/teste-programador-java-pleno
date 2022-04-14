import { gql } from "@apollo/client/core"

export const createOrder = gql`
    mutation CreateOrder($code: String!, $desc: String!, $product_ids: [String]!) {
        createOrder(user_code: $code, desc: $desc, product_ids: $product_ids) {
            user {
                code
            }
            desc
        }
    }
`