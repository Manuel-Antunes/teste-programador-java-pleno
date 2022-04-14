import { gql } from "@apollo/client/core";

export const updateUser = gql`
  mutation UpdateUser(
    $code: String!
    $name: String
    $email: String
    $cpf: String
    $phone: String
  ) {
    updateUser(
      code: $code
      user_name: $name
      email: $email
      cpf: $cpf
      phone_number: $phone
    ) {
      user_name
      email
      cpf
      phone_number
    }
  }
`;
