import { render, screen } from '@testing-library/react';
import Login from './Login';

describe("<Login />", () => {
  it("Renders <Login /> component correctly", () => {
    const { getByText } = render(<Login />);
    expect(getByText(/Getting started with React testing library/i)).toBeInTheDocument();
  });
});
