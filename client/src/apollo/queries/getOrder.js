import { gql } from "@apollo/client/core";

export const getOrder = gql`
  query GetOrder($id: Int!) {
    order(id: $id) {
      number
      issue_date
      desc
      total_price
      products {
        code
        name
        units
        price
        desc
      }
    }
  }
`;
