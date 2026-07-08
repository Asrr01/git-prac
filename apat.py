def greet(name: str) -> str:
    """Return a greeting for the given name."""
    return f"Hello, {name}! Welcome to the sample Python code."


def factorial(n: int) -> int:
    """Compute the factorial of n using recursion."""
    if n < 0:
        raise ValueError("Factorial is not defined for negative numbers.")
    return 1 if n in (0, 1) else n * factorial(n - 1)


if __name__ == "__main__":
    user_name = input("Enter your name: ")
    print(greet(user_name.strip()))

    try:
        value = int(input("Enter a non-negative integer: "))
        print(f"Factorial of {value} is {factorial(value)}")
    except ValueError as error:
        print(f"Error: {error}")
